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
    'playlists/show' => ['front\PlaylistController', 'show', ['id']],
    'contact' => ['front\ContactController', 'contact'],
    'error' => ['front\ErrorController' , 'error'],

   // affichage track admin

    'admin/tracks/playlistAdd' => ['admin\TrackController', 'addTrackToPlaylist'],
    'admin/tracks/add' => ['admin\TrackController', 'add'],
    'admin/tracks' => ['admin\TrackController', 'browse' ],
    'admin/tracks/show' => ['admin\TrackController', 'show', ['id']],
    'admin/tracks/delete' => ['admin\TrackController', 'delete',],
    'admin/tracks/edit' => ['admin\TrackController', 'edit', ['id']],
    'admin/tracks/update' => ['admin\TrackController', 'update', ['id']],
    'admin/register' => ['admin\RegisterController', 'login'],
    'admin' => ['admin\HomeController', 'index'],
    'admin/logout' => ['admin\RegisterController', 'logout'],


   // affichage playlists admin 

    'admin/playlists/add' => ['admin\PlaylistController', 'add'],
    'admin/playlists' => ['admin\PlaylistController', 'browse'],
    'admin/playlists/show' => ['admin\PlaylistController', 'show' , ['id']],
    'admin/playlists/delete' => ['admin\PlaylistController', 'delete' ,],
    'admin/playlists/edit' => ['admin\PlaylistController', 'edit' , ['id']],
];