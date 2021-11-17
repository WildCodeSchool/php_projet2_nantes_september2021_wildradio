<?php

namespace App\Controller\admin;


use App\Model\PlaylistManager;
use App\Model\TrackManager;
use App\Model\TrackPlaylistManager;

class PlaylistController extends AbstractController
{
    public $playlist; 
    public $errors = [];
    public $trackPlaylist;
    public $item;


 // constructeur permet de sécuriser l'acces  

 public function __construct()
 {
     parent::__construct();
     session_start();
     if (!isset($_SESSION['Connected'])) {
        header ("Location: /");
     }
 }


 // Ajouter une playlist

 public function add()
 {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
         $verified = $this->verification(); 
                     
 
         if (empty($this->errors)){
 
         // validation et redirection 
 
             $this->uploadFile();
             $playlistManager = new PlaylistManager();
             $playlistManager->insert($this->playlist);
             return $this->twig->render('/admin/Playlist/add.html.twig', ["messageEnvoi" => "La playlist a bien été créée" ,'action'=> "/admin/playlists/add", 'button' => 'Ajouter à la playlist']);
         }
         
         return $this->twig->render('/admin/Playlist/add.html.twig', ["errors" => $this->errors ,'action'=> "/admin/playlists/add"]);
        
     }
  return $this->twig->render('/admin/Playlist/add.html.twig', ['button' => 'Ajouter à la playlist']);   
 }


public function verification() 
{
     // clean $_POST data
        $this->playlist = array_map('trim', $_POST);

        // Valider le format

        if ($this->playlist['name'] == "") {
            $this->errors['name'] = "Le nom de la playlist est obligatoire";
        }

        if ($this->playlist['description'] == "") {
            $this->errors['description'] = "Ajoutez une description";
        }

        // Verifier les caractères spéciaux tu titre
   

       // on indique 1 ou 0 si l'ajout au flux est coché
        $this->playlist['is_online'] = (isset($_POST['is_online'])) ? 1 : 0;
}

 // Affichager toutes les playlists

public function browse(): string
{
    $playlistManager = new PlaylistManager();
    $playlists = $playlistManager->getAll();

    return $this->twig->render('admin/Playlist/index.html.twig', ['playlists' => $playlists]);
}

public function show($id):string
{

    $playlistManager = new PlaylistManager();
    $playlist= $playlistManager->selectOneById($id);

    return $this->twig->render('admin/Playlist/show.html.twig', ['playlist' => $playlist]);
}


// Modifier une playlist

public function edit(int $id)
{
    $playlistManager = new PlaylistManager();
    $this->playlist = $playlistManager->selectOneById($id);

    return $this->twig->render('admin/Playlist/edit.html.twig', ['action'=> "/admin/playlists/update?id=$id", 'playlist' => $this->playlist, 'button'=> "Modifier une track"]);
}

public function update(int $id)
{
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $this->verification(); 
        $this->uploadFile();

        // a faire verif erreur 
       
            // validation et redirection
            $playlistManager = new PlaylistManager();
            $playlistManager->update($this->playlist);
            header('Location: /admin/playlists/show?id=' . $id);
        
    }
   
    echo "oups";
}


// Supprimer une playlist
 
public function delete()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = trim($_POST['id']);
        $playlistManager = new PlaylistManager();
        $playlistManager->delete($id);
        header('Location:/admin/playlists/');
    }
}
// Ajouter image 

public function verifFile()
    {

        // Le poids max géré par PHP
        $maxFileSize = 20000000;
  
        if (file_exists($_FILES['img']['tmp_name']) && filesize($_FILES['img']['tmp_name']) > $maxFileSize) {
            $this->errors["img"] ="L'image ne doit pas dépasser 2Mo";} 

        // // Je récupère l'extension du fichier
        $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

        // // Les extensions autorisées
        $authorizedExtensions = ['jpg'];
        if( (!in_array($extension, $authorizedExtensions))){
            $this->errors['img'] = 'Veuillez sélectionner un fichier jpg !';
        }

    }          

public function uploadFile() 
    {

            // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés
            $uploadDir = "/assets/images/";

            // // Je récupère l'extension du fichier
            $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

            // le nom de fichier
            $uploadFile = $uploadDir . uniqid() . "." . $extension ;

            // on précise le chemin du fichier pour la BDD
            move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . $uploadFile);  
            $this->playlist['img'] = $uploadFile;
            
    }


 /**
 * Afficher une vue des playlists filtrées en fonction du mot recherché
 */
public function search()
{

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $this->item = $_GET['search'];
        $playlistManager = new PlaylistManager();
        $playlists = $playlistManager->getElementsFiltered($this->item);

        return $this->twig->render('admin/Playlist/index.html.twig', ['playlists' => $playlists]);
    } 

    $this->browse();
}

}