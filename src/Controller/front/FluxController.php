<?php

namespace App\Controller\front;

use App\Model\TrackManager;
use App\Controller\admin;

class FluxController extends admin\AbstractController
{

    /**
     * Afficher les tracks pour la lecture du flux continu
     */
    public function browse(): string
    {
        $trackManager = new TrackManager();
        $tracks = $trackManager->getAll();

        return $this->twig->render('Front/index.html.twig', ['tracks' => $tracks]);
    
    }

}

