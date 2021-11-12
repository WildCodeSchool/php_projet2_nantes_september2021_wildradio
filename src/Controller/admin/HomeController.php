<?php

namespace App\Controller\admin;

class HomeController extends AbstractController
{

    public function index(){

        session_start();
        if (!isset($_SESSION['Connected'])) {
           header ("Location: /admin/register");
        }

        return $this->twig->render('admin/index.html.twig');
    }
}