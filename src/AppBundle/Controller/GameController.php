<?php
declare(strict_types=1);

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * The Game Controller handles listing, joining and leaving of games. It can
 * also show the game the user is currently enrolled in.
 *
 * @author Roelof Roos
 */
class GameController extends Controller
{
    /**
     * [description for listAction]
     *
     * @return Response
     */
    public function listAction() : Response
    {
        return $this->render('AppBundle:GameController:list.html.twig', array(
            // ...
        ));
    }

    /**
     * [description for joinAction]
     *
     * @return Response
     */
    public function joinAction() : Response
    {
        return $this->render('AppBundle:GameController:join.html.twig', array(
            // ...
        ));
    }

    /**
     * [description for leaveAction]
     *
     * @return Response
     */
    public function leaveAction() : Response
    {
        return $this->render('AppBundle:GameController:leave.html.twig', array(
            // ...
        ));
    }

    /**
     * [description for currentAction]
     *
     * @return Response
     */
    public function currentAction() : Response
    {
        return $this->render('AppBundle:GameController:current.html.twig', array(
            // ...
        ));
    }

}
