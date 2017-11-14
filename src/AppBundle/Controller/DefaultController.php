<?php
declare(strict_types=1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Asset\Packages;
use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\HttpFoundation\HeaderBag;

class DefaultController extends Controller
{
    /**
     * Filename of the launch CSS file
     * @var string
     */
    const LAUNCH_CSS = 'public/css/launch.css';

    /**
     * Key for the cache where the filenames are stored
     * @var string
     */
    const PATH_CACHE_KEY = 'app.default.asset-files';

    /**
     * Key for the cache where the file contents are stored.
     * @var string
     */
    const CONTENT_CACHE_KEY = 'app.default.asset-content';

    /**
     * Lifetime, in seconds, of the filenames cache. Shouldn't be too big (~5
     * min)
     * @var int
     */
    const PATH_CACHE_TTL = 60 * 5 -900;

    /**
     * Lifetime, in seconds, of the content cache. Can be a bit bigger (~15 min)
     * @var int
     */
    const CONTENT_CACHE_TTL = 60 * 15 -900;

    /**
     * Current request
     * @var Request
     */
    private $request;

    /**
     * Renders the index page with an 'above the fold' CSS set
     * @param  Request  $request
     * @return Response
     */
    public function indexAction(Request $request) : Response
    {
        $this->request = $request;
        $cssInfo = $this->getAssetContents('public/css/launch.css');

        // Load the app
        $response = $this->render('default/app.html.twig', [
            'launch_css' => $cssInfo
        ]);

        // HTTP/2 push headers
        $headers = $response->headers;
        $this->addHttpPush('stylesheet', 'public/css/main.css', $headers);
        $this->addHttpPush('script', 'public/js/main.js', $headers);

        return $response;
    }

    public function addHttpPush(
        string $type,
        string $asset,
        HeaderBag $headers
    ) : bool {
        $info = $this->getAssetPath($asset);
        if ($info === null || empty($info['url'])) {
            return false;
        }

        $headers->set(
            'Link',
            sprintf(
                '<%s>; rel=preload; as=%s;',
                $info['url'],
                $type
            ),
            false
        );

        return true;
    }

    /**
     * Returns the path to the given asset.
     *
     * @param  string  $path    Path to the file
     * @return array   Array with keys 'url' and 'path'.
     */
    public function getAssetPath(string $path) : ?array
    {
        // Get properties
        $cache = $this->get('cache.app');
        $logger = $this->get('logger');
        $cacheItem = $cache->getItem(self::PATH_CACHE_KEY);

        $data = [];

        if ($cacheItem->isHit()) {
            $data = $cacheItem->get();
            if (array_key_exists($path, $data)) {
                $logger->debug('Retireved URL data {data} from cache', [
                    'data' => $data[$path]
                ]);
                return $data[$path];
            }
        }

        $kernel = $this->get('kernel');
        $packages = $this->get('assets.packages');

        $assetUrl = $packages->getUrl($path);

        $logger->debug('Retireved URL {url} from asset system', [
            'url' => $assetUrl
        ]);

        // Get the full path and then formulate the full filesystem path to the
        // asset.
        $webPath = $kernel->getRootDir() . '/../web' . $this->request->getBasePath();
        $assetPath = rtrim($webPath, '/') . '/' . ltrim($assetUrl, '/');

        $data[$path] = [
            'url' => $assetUrl,
            'path' => $assetPath
        ];

        $cacheItem->expiresAfter(self::PATH_CACHE_TTL);
        $cacheItem->set($data);
        $cache->save($cacheItem);

        $logger->debug('URL cache is now {data}.', [
            'data' => $data
        ]);

        return $data[$path];
    }

    /**
     * Returns the CSS for the 'launch' CSS, which only contains the most vital
     * settings and some blatant styling. The rest is applied when the the
     * Javascript is ready to roll.
     *
     * @param string   $path    Asset path
     * @return string  Contents of the file, or null if not found
     */
    protected function getAssetContents(string $path) : ?string
    {
        $cache = $this->get('cache.app');
        $logger = $this->get('logger');
        $fs = $this->get('filesystem');

        $pathData = $this->getAssetPath($path);

        if ($pathData === null) {
            return null;
        }

        $assetPath = $pathData['path'];
        $cacheItem = $cache->getItem(self::CONTENT_CACHE_KEY);

        // Get cache
        $data = [];

        if ($cacheItem->isHit()) {
            $data = $cacheItem->get();
            if (array_key_exists($assetPath, $data)) {
                $logger->debug('Retireved content for {path} from cache', [
                    'data' => $data[$assetPath],
                    'path' => $assetPath
                ]);
                return $data[$assetPath];
            }
        }

        if ($fs->exists($assetPath)) {
            // Get first 100kb
            $content = file_get_contents($assetPath, false, null, 0, 1024*100);
        } else {
            $content = null;
        }

        $logger->debug('Retrieved content for {path}.', [
            'path' => $assetPath,
            'content' => $content
        ]);

        $data[$assetPath] = $content;
        $cacheItem->set($data);
        $cache->save($cacheItem);

        $logger->debug('URL cache is updated.', [
            'data' => $data
        ]);

        return $data[$assetPath];
    }
}
