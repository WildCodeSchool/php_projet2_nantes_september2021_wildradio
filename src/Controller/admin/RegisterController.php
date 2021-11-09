<?php

namespace App\Controller\admin;

use App\Model\RegisterManager;

class RegisterController extends AbstractController
{

    public $user; 
    public $errors = [];

    // permet de se connecter à l'espace administrateur 
    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->verificationData(); 
            $this->VerificationIdentity();
            $this->VerificationPassword();
            
            if (empty($this->errors)){
                $this->sessionStart();
                header('Location: /admin/');
            }
        }

        return $this->twig->render('admin/Register/index.html.twig');

    }

    // Permet de vérifier les données entrées par l'utilisateur 
    public function verificationData() 
    {
        
        $this->user = array_map('trim', $_POST);

        if ($this->user['username'] == "") {
            $this->errors['username'] = "Le nom d'utilisateur est obligatoire";
        }

        if ($this->user['password'] == "") {
            $this->errors['password'] = "Le mot de passe est obligatoire";
        }

    
    }

    // Permet de comparer le username entré avec celui présent en BDD  
    public function VerificationIdentity() 
    {
        $registerManager = new RegisterManager();
        $userConnecting = $registerManager->selectByUsername($user['username']);

        var_dump($result);
        die();

        if ($result === false ) {
            $this->errors['username'] = "L'utilisateur ou mot de passe incorrect";
        }

    }    

    //Permet de vérifier la validité du mot de passe ; retourne true si il est conforme
    // à compléter ! 
    public function VerificationPassword() 
    {
        $registerManager = new RegisterManager();
        $userConnecting = $registerManager->selectByUsername($user['username']);

        if (password_verify($user['password'], $userConnecting->$Password)) {
            return true ;
        } else { 
            $this->errors['username'] = "L'utilisateur ou mot de passe incorrect";
        };
    }

    // Si le mot de passe et le nom de l'utilisateur sont correct alors ouverture de session 
    // à compléter !
    public function sessionStart()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_SESSION['username']=$user['username'];

            if(isset($_SESSION['username'])){
                header('Location: /');
            }
        }

    }

}