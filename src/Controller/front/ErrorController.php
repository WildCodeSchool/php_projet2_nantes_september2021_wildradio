<?php

namespace App\Controller\front;

class ErrorController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */


         
    public function error()
    {

    return $this->twig->render('front/error.html.twig');
    }
       
}    