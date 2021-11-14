<?php

namespace App\Controller\admin;


use App\Model\PlaylistManager;
use App\Model\TrackManager;


class PlaylistController extends AbstractController
{


    public $playlist; 
    public $errors = [];
    public $trackPlaylist;
    

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

        if (!preg_match("/^[a-zA-Z ]*$/", $this->playlist['name'])) {
            $this->errors['name'] = "Seul les lettres et espaces sont autorisés";
        }

        
        if (!preg_match("/^[a-zA-Z ]*$/", $this->playlist['tag'])) {
            $this->errors['tag'] = "Seul les lettres et espaces sont autorisés";
        }

        
       // on indique 1 ou 0 si l'ajout au flux est coché
        $this->playlist['is_online'] = (isset($_POST['is_online'])) ? 1 : 0;
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
            header('Location:admin/playlists/show');

        }
        
        return $this->twig->render('/admin/Playlist/add.html.twig', ["errors" => $this->errors ,'action'=> "/admin/playlists/add"]);
        var_dump($this->playlist);
        var_dump($this->errors);
    }
    return $this->twig->render('/admin/Playlist/add.html.twig');
  
}



 // Affichager une playlist

public function browse(): string
{
    $playlistManager = new PlaylistManager();
    $playlists = $playlistManager->getAll();

    return $this->twig->render('admin/Playlist/index.html.twig', ['playlists' => $playlists]);
}


 // Supprimer une playlist
 
public function delete()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = trim($_POST['id']);
        $playlistManager = new PlaylistManager();
        $playlistManager->delete($id);
        header('Location:/playlists');
    }
}

// Ajouter image 

public function uploadFile() {

    // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés
    $uploadDir = "/assets/images/";

    // // Je récupère l'extension du fichier
    $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

    // // Les extensions autorisées
    $authorizedExtensions = ['jpg', 'jpeg' , 'png'];
    if( (!in_array($extension, $authorizedExtensions))){
        $this->errors[] = 'Veuillez sélectionner un fichier jpg';
    }

    // le nom de fichier
    $uploadFile = $uploadDir . uniqid() . "." . $extension;

    // Poid de du JPG .. 
    $maxFileSize = 2000000;

 

    if (isset ($_FILES['img']['tmp_name']) && filesize($_FILES['img']['tmp_name']) > $maxFileSize) {
        $this->errors["img"] ="L'image ne doit pas dépasser 2M";
     } else {

           // on précise le chemin du fichier pour la BDD
           move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . $uploadFile);
     
           $this->playlist['img'] = $uploadFile;
           }
    
}

// Editier une playlist

public function edit(int $id)
{
    $playlistManager = new PlaylistManager();
    $this->playlist = $playlistManager->selectOneById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Format
        $verified = $this->verification(); 


        // validation et redirection
        $playlistManager->update($this->playlist );
        header('Location: /playlists/show?id=' . $id);
    }

    return $this->twig->render('admin/Playlist/edit.html.twig', [
        'playlist' => $this->playlist , 'action'=> "/playlists/edit?id=$id" 
    ]);
}
  
// Afficher après création et modifier playlist

public function show($id):string
{
    $playlistManager = new PlaylistManager();
    $playlist= $playlistManager->selectOneById($id);

    return $this->twig->render('admin/Playlist/show.html.twig', ['playlist' => $playlist]);
}

}


