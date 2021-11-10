<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller\front;

use App\Model\TrackManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $trackManager = new TrackManager();
        $tracks = $trackManager->getAll();

        return $this->twig->render('front/index.html.twig', ['tracks' => $tracks]);
    }   
}