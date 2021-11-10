<?php

namespace App\Controller\front;

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
    public function show($id): string
    {
        // $playlistManager = new PlaylistManager();
        // $playslist = $playlistManager->selectOneById($id);

        return $this->twig->render('front/playlist.html.twig', ['track' => $track]);
    }
       
}    