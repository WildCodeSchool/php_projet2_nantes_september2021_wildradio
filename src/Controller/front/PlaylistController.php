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
        $playlistManager = new PlaylistManager();
        $playlists = $playlistManager->getAll();

        return $this->twig->render('front/catalogue.html.twig', ['playlists' => $playlists]);
    }

    /**
     * Show informations for a specific track
     */
    public function show($id)
    {
        $trackPlaylistManager = new TrackPlaylistManager();
        $tracksInPlaylist= $trackPlaylistManager-> selectTracksInPlaylist($id);
       
        $playlistManager = new PlaylistManager();
        $playlist= $playlistManager->selectOneById($id);


        //var_dump( $tracksInPlaylist);
        //var_dump( $playlist);
       
        return $this->twig->render('front/playlist.html.twig', ['playlist'=>$playlist, 'tracksInPlaylist'=> $tracksInPlaylist]);

    }
       
}    