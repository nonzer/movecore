<?php


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Acceuil', route('home'));
});

// Home/Clients
Breadcrumbs::for('client', function ($trail) {
    $trail->parent('home');
    $trail->push("Clients", route('client.index'));
});

// Home/Clients/create
Breadcrumbs::for('client_create', function ($trail) {
    $trail->parent('client');
    $trail->push("Ajouter un Client", route('client.create'));
});

//client_create