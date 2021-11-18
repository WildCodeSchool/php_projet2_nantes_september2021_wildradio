<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)

return [
     
    // affichage Front (user)
     
    '' => ['front\HomeController', 'index'],
    'playlists' => ['front\PlaylistController', 'browse' ],
    'playlist/show' => ['front\PlaylistController', 'show', ['id']],
    'contact' => ['front\ContactController', 'contact'],
    'error' => ['front\ErrorController' , 'error'],
  

    // s'enregistrer et se balader dans admin 

    'admin/register' => ['admin\RegisterController', 'login'],
    'admin' => ['admin\HomeController', 'index'],
    'admin/logout' => ['admin\RegisterController', 'logout'],

   // affichage track admin

    'admin/tracks/playlistAdd' => ['admin\TrackController', 'addTrackToPlaylist'],
    'admin/tracks/add' => ['admin\TrackController', 'add'],
    'admin/tracks' => ['admin\TrackController', 'browse' ],
    'admin/tracks/search' => ['admin\TrackController', 'search', ['item']],
    'admin/tracks/show' => ['admin\TrackController', 'show', ['id']],
    'admin/tracks/delete' => ['admin\TrackController', 'delete',],
    'admin/tracks/edit' => ['admin\TrackController', 'edit', ['id']],
    'admin/tracks/update' => ['admin\TrackController', 'update', ['id']],
    'admin/tracks/flux' => ['admin\TrackController', 'browseFlux' ],

 
   // affichage playlists admin 

   'admin/playlists' => ['admin\PlaylistController', 'browse'],
    'admin/playlists/add' => ['admin\PlaylistController', 'add'],
    'admin/playlists/show' => ['admin\PlaylistController', 'show' , ['id']],
    'admin/playlists/edit' => ['admin\PlaylistController', 'edit' , ['id']],
    'admin/playlists/delete' => ['admin\PlaylistController', 'delete'],
    'admin/playlists/update' => ['admin\PlaylistController', 'update', ['id']],
    'admin/playlists/search' => ['admin\PlaylistController', 'search', ['item']],
    'admin/playlists/update' => ['admin\PlaylistController', 'update', ['id']],
    
];
