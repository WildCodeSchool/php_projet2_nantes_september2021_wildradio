<?php

namespace App\Controller\admin;

use App\Model\TrackManager;
use App\Model\PlaylistManager;

class TrackController extends AbstractController
{

    public $track; 
    public $playlists;
    public $errors = [];

    // constructeur permet de sécuriser l'acces pour 

    public function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['Connected'])) {
           header ("Location: /");
        }

    }

    // Permet de vérifier les données entrantes 
    public function verification() 
    {

            // clean $_POST data
            $this->track = array_map('trim', $_POST);


            // on indique 1 ou 0 si l'ajout au flux est coché
            $this->track['flux'] = (isset($_POST['flux'])) ? 1 : 0;


            if ($this->track['title'] == "") {
                $this->errors['title'] = "Le nom de la track est obligatoire";
            }

            // check if only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $this->track['title'])) {
                $this->errors['title'] = "Seul les lettres et espaces sont autorisés";
            }
            if ($this->track['artist'] == "") {
                $this->errors['artist'] = "Le nom de l'artiste est obligatoire";
            }

            if (!preg_match("/^[a-zA-Z ]*$/", $this->track['artist'])) {
                $this->errors['artist'] = "Seul les lettres et espaces sont autorisés";
            }

            if ($this->track['album'] == "") {
                $this->errors['album'] = "Le nom de l'album est obligatoire";
            }
            if (!preg_match("/^[a-zA-Z ]*$/", $this->track['album'])) {
                $this->errors['album'] = "Seul les lettres et espaces sont autorisés";
            }

    }
    
    /// Traiement de l'upload des fichiers mp3 :
    public function uploadFile() 
    {

            // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés
            $uploadDir = "/assets/audio/";

            // // Je récupère l'extension du fichier
            $extension = pathinfo($_FILES['mp3']['name'], PATHINFO_EXTENSION);

            // // Les extensions autorisées
            $authorizedExtensions = ['mp3'];
            if( (!in_array($extension, $authorizedExtensions))){
                $this->errors['mp3'] = 'Veuillez sélectionner un fichier mp3 !';
            }

            // le nom de fichier
            $uploadFile = $uploadDir . uniqid() . "." . $extension;

            // Le poids max géré par PHP
            $maxFileSize = 2000000;
  
            if (isset ($_FILES['mp3']['tmp_name']) && filesize($_FILES['mp3']['tmp_name']) > $maxFileSize) {
                $this->errors["mp3"] ="le poid max du fichier est de 2Mo";
             } else {
                 
                 move_uploaded_file($_FILES['mp3']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . $uploadFile);
                 // on précise le chemin du fichier pour la BDD
                  $this->track['mp3'] = $uploadFile;
                }    
    }

     /**
     * Add a new track to the database with a form
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->verification(); 
                        
            if (empty($this->errors)){
                $this->uploadFile();
                $trackManager = new TrackManager();
                $trackManager->insert($this->track);
                header('Location:/admin/tracks/show?id={{track.id}}?>');
            }
            
            return $this->twig->render('admin/Track/add.html.twig', ["errors" => $this->errors ,'action'=> "/tracks/add", 'button'=>"Ajouter une track"]);
            
        }
      
        return $this->twig->render('admin/Track/add.html.twig', ['button'=>"Ajouter une track"]);
      
    }


     /**
     * List track
     */
    public function browse(): string
    {
        $trackManager = new TrackManager();
        $tracks = $trackManager->getAll();

        return $this->twig->render('admin/Track/index.html.twig', ['tracks' => $tracks, 'titre' => 'Toutes mes tracks']);
    }


    /**
     * Show informations for a specific track
     */
    public function show($id): string
    {
        $trackManager = new TrackManager();
        $track = $trackManager->selectOneById($id);

        return $this->twig->render('admin/Track/show.html.twig', ['track' => $track]);
    }

    /**
     * Delete a specific track
     */
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $trackManager = new TrackManager();
            $trackManager->delete($id);
            header('Location:/admin/tracks');
        }
    }

    
    /**
     * permet d'afficher le formulaire pré-rempli 
     */
    public function edit(int $id)
    {
        $trackManager = new TrackManager();
        $track = $trackManager->selectOneById($id);

        $this->playlists = $this->browsePlaylists();


        return $this->twig->render('admin/Track/edit.html.twig', ['track' => $track , 'action'=> "/admin/tracks/update?id=$id", 'playlists' => $this->playlists, 'button'=> "Modifier une track"]);
    
    }

    /**
     * permet de mettre à jour les données du formulaire  
     */

    public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Verification
            $verified = $this->verification(); 

            // if validation is ok, update 
            if (empty($this->errors)){
                
                $trackManager = new TrackManager();
                $trackManager->update($this->track );
                header('Location: /admin/tracks/show?id=' . $id);
            }    
        }
    }

   
    /**
     * Permet d'ajouter une track à une playlist
     */
    public function addTrackToPlaylist()
    {
        var_dump($_POST);
        die();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    
            if (empty($this->errors)){
                $trackManager = new TrackManager();
                $trackManager->link($_POST['id'], $_POST['addPlaylist']);
            }
            
            return $this->twig->render('Track/add.html.twig', ["errors" => $this->errors ,'action'=> "/tracks/add"]);
           
        }
        return $this->twig->render('admin/Track/add.html.twig');
      
    }

    /**
     * Permet d'afficher les playlists dans lesquels ajouter les tracks
     */
    public function browsePlaylists()
    {
        $playlistManager = new PlaylistManager();
        return  $playlistManager->getAll();

    }

    /**
     * Permet d'afficher les tracks présentes dans le flux 
     */
    public function browseFlux()
    {
        $trackManager = new TrackManager();
        $tracks = $trackManager->getTracksInFlux();

        return $this->twig->render('admin/Track/index.html.twig', ['tracks' => $tracks, 'titre' => 'Mon flux']);

    }

}
