<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [

    'tracks/add' => ['admin\TrackController', 'add'],
    'tracks' => ['admin\TrackController', 'browse' ],
    'tracks/show' => ['admin\TrackController', 'show', ['id']],
    'tracks/delete' => ['admin\TrackController', 'delete',],
    'tracks/edit' => ['admin\TrackController', 'edit', ['id']],

    '' => ['front\FluxController', 'browse'],
    'playlists' => ['front\PlaylistController', 'browse' ],
    'playlists/show' => ['front\PlaylistController', 'show', ['id']],
    'contact' => ['front\HomeController', 'contact'],
    'error' => ['front\HomeController' , 'error'],
// verifier error // 

    'items' => ['ItemController', 'index'],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete'] 
];
