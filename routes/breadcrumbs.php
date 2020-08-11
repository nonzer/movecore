<?php


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Dashboard', route('home'));
});

// Home
Breadcrumbs::for('country', function ($trail) {
    $trail->push('Countries', route('country.index'));
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


//category
Breadcrumbs::for('category', function ($trail) {
    $trail->parent('category.index');
    $trail->push("Ajouter une catégorie de client", route('category.create'));
});

//category.index
Breadcrumbs::for('category.index', function ($trail) {
    $trail->parent('client');
    $trail->push("Catégorie de client", route('category.index'));
});

//category.edit
Breadcrumbs::for('category.edit', function ($trail, $cat) {
    $trail->parent('category');
    $trail->push("Editer : Categorie ".$cat->name, route('category.edit',$cat->id));
});
//order.index
Breadcrumbs::for('order.index', function ($trail) {
    $trail->parent('home');
    $trail->push("Commandes", route('order.index'));
});