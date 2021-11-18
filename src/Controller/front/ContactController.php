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
        return $this->twig->render('front/contact.html.twig');
    }


   public function send()
   {
    $from = $_POST ["user_mail"];
    $to = "hello@gmail.com";
    $subject = $_POST ["user_subject"];
    $message = $_POST ["user_message"];
    $headers = "De :" . $from;
    mail($to,$subject,$message, $headers);
   }
    
}