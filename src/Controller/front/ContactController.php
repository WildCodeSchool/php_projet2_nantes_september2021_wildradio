<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller\front;

class ContactController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

     public function contact()
    {
        
        if (isset($_POST['message'])) {
            echo '<p align="center">Votre message a bien été envoyé. Merci !</p>';

/*          $position_arobase = strpos($_POST['email'], '@');
            if ($position_arobase === false) {
                echo '<p>Votre email doit comporter un arobase.</p>';
            } else {
                $retour = mail('johan.mabit@gmail.com', 'Envoi depuis la page Contact', $_POST['name'], $_POST['message'], 'From: ' . $_POST['email']);

             } if($retour) {
                    echo '<p align="center">Votre message a bien été envoyé. Merci !</p>';
                } else {
                    echo '<p align="center">Erreur.</p>';
                }
                */
    }
    return $this->twig->render('front/contact.html.twig');

    }

}