<?php

namespace App\Controller\admin;

use App\Model\RegisterManager;

class RegisterController extends AbstractController
{

    // permet de se connecter à l'espace administrateur 
    public function login()
    {
        $registerManager = new RegisterManager();

    

    return $this->twig->render('admin/Register/index.html.twig');

    }


    public function verification() 
    {
        

    }

}