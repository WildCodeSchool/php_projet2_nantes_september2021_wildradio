<?php

namespace App\Controller\admin;

class HomeController extends AbstractController
{

    public function index(){

        return $this->twig->render('admin/index.html.twig');
    }
}