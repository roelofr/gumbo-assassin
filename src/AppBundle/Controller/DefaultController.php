<?php
declare(strict_types=1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Renders the index page
     * @param  Request  $request
     * @return Response
     */
    public function indexAction(Request $request) : Response
    {
        return $this->render('default/app.html.twig');
    }
}
