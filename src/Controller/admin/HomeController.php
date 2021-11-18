<?php

namespace App\Controller\admin;

class HomeController extends AbstractController
{

    // permet de sécuriser l'accès pour admin identifié 

    public function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['Connected'])) {
            header ("Location: /");
        }
    }

    // permet d'afficher la page d'acceuil d'admin

    public function index()
    {

        return $this->twig->render('admin/index.html.twig');
    }
}