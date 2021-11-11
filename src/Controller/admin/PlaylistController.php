<?php

namespace App\Controller\admin;

use App\Model\TrackManager;

class PlaylistController extends AbstractController
{

    public $playlist;
    public $trackPlaylist;
    public $errors = [];

    // Permet de vérifier les données entrantes 
    public function verification() 
        {
            // clean $_POST data
            $this->playlist = array_map('trim', $_POST);
    
            // on indique 1 ou 0 si la mise en ligne est cochée
                $this->playlist['online'] = (isset($_POST['online'])) ? 1 : 0;
    
            // rendre obligatoire l'ajout d'un nom et d'une description à la playlist

            if ($this->playlist['name'] == "") {
                $this->errors['name'] = "Hey ! Le nom de la playlist est obligatoire";
            }
            if ($this->playlist['description'] == "") {
                $this->errors['description'] = "Tu dois ajouter une description à ta super playlist";
            }
            if ($this->playlist['img'] == "") {
                $this->errors['img'] = "Tu dois ajouter une image d'illustration à ta playlist";
            }
        }
}
