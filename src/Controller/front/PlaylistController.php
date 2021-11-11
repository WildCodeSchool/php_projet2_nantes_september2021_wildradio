<?php

namespace App\Controller\front;

use App\Model\PlaylistManager;
use App\Model\TrackPlaylistManager;


class PlaylistController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

         
    public function browse()
    {
        return $this->twig->render('front/catalogue.html.twig');
    }

    /**
     * Show informations for a specific track
     */
    public function show($id)
    {
        $trackPlaylistManager = new TrackPlaylistManager();
        $selectedPlaylist = $trackPlaylistManager->selectOnePlaylistById($id);

        //var_dump( $selectedPlaylist);
        return $this->twig->render('front/playlist.html.twig', ['selectedPlaylist[]'=> $selectedPlaylist] );

    }
       
}    