<?php

namespace App\Controller\admin;
use \App\Model\TrackManager;

class TrackController extends AbstractController
{
   
     /**
     * Add a new track to the database with a form 
     */
    public function add()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $track = array_map('trim', $_POST);

 
            // TODO validations (length, format...)


            // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés (attention ce dossier doit être accessible en écriture)
            $uploadDir = "/assets/audio/";
    
            // // Je récupère l'extension du fichier
            $extension = pathinfo($_FILES['mp3']['name'], PATHINFO_EXTENSION);
            
            // le nom de fichier sur le serveur est celui du nom d'origine du fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
            $uploadFile = $uploadDir .uniqid(). ".". $extension;
            
           
            // // Les extensions autorisées
            $authorizedExtensions = ['mp3'];

            // Le poids max géré par PHP par défaut est de 2M
            $maxFileSize = 2000000;  

            //  /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
            if( file_exists($_FILES['mp3']['tmp_name']) && filesize($_FILES['mp3']['tmp_name']) > $maxFileSize){
            $errors[] = "Votre fichier doit faire moins de 2M !";
            }

             // on déplace le fichier temporaire vers le nouvel emplacement sur le serveur. Ca y est, le fichier est uploadé
             move_uploaded_file($_FILES['mp3']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$uploadFile);
            // on précise le chemin du fichier pour la BDD 
             $track['mp3']=$uploadFile;
            // on indique 1 ou 0 si l'ajout au flux est coché 
            $track['flux'] = (isset($_POST['flux'])) ? 1 : 0;

            // if validation is ok, insert and redirection
            $trackManager = new TrackManager();
            var_dump( $track);
           
            $id = $trackManager->insert($track);

        } 

        return $this->twig->render('Track/add.html.twig');
    }


}