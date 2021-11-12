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
            $this->verificationIdentity($this->user);
            $this->verificationPassword($this->user);
            
            if (empty($this->errors)){
                $this->sessionStart();
            }
        }
        return $this->twig->render('admin/Register/index.html.twig', ["errors" => $this->errors ]);
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
    public function verificationIdentity($user) 
    {
        $registerManager = new RegisterManager();
        $userConnecting = $registerManager->selectByUsername($user['username']);

        // si $Userconnectiing est faux, cela signifie que l'utlisateur n'est pas enregistré dans la BDD
        if ($userConnecting === false ) {
            $this->errors['username'] = "L'utilisateur ou mot de passe incorrect";
        }
        
    }    

    //Permet de vérifier la validité du mot de passe ; retourne true si il est conforme
    // à compléter ! 
    public function verificationPassword($user) 
    {
        $registerManager = new RegisterManager();
        $userConnecting = $registerManager->selectByUsername($user['username']);

        if (password_verify($user['password'], $userConnecting['password'])) {
            return true ;
        } else { 
            $this->errors['username'] = "L'utilisateur ou mot de passe incorrect";
        };
              
    }

    // Si le mot de passe et le nom de l'utilisateur sont correct alors ouverture de session 
    public function sessionStart()
    {
        session_start();
        $_SESSION['Connected'] = 'true';
        header('Location: /admin/');

    }

    // non utile pour la v1
    public function addMember(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
          $this->verificationData(); 
                   
          if (empty($this->errors)){
            $registerManager = new RegisterManager();
            $registerManager->insert($this->user);
            header('Location: /admin/');
          }
        }
    }
}