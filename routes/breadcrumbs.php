<?php


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Dashboard', route('home'));
});

//Pays
Breadcrumbs::for('country', function ($trail) {
    $trail->push('Pays', route('country.index'));
});
Breadcrumbs::for('add-country', function ($trail) {
    $trail->parent('country');
    $trail->push('Ajout pays');
});
Breadcrumbs::for('edit-country', function ($trail, $id) {
    $trail->parent('country');
    $trail->push('Modification pays / '.$id);
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
//Ville
Breadcrumbs::for('city', function ($trail) {
    $trail->push('Villes', route('city.index'));
});
Breadcrumbs::for('add-city', function ($trail) {
    $trail->parent('city');
    $trail->push('Ajout ville');
});
Breadcrumbs::for('edit-city', function ($trail, $id) {
    $trail->parent('city');
    $trail->push('Modification ville / '.$id);
});

//Arrondissement
Breadcrumbs::for('arrondissement', function ($trail) {
    $trail->push('Arrondissements', route('arrondissement.index'));
});
Breadcrumbs::for('add-arrondissement', function ($trail) {
    $trail->parent('arrondissement');
    $trail->push('Ajout arrondissement');
});
Breadcrumbs::for('edit-arrondissement', function ($trail, $id) {
    $trail->parent('arrondissement');
    $trail->push('Modification arrondissement / '.$id);
});

//Quartier
Breadcrumbs::for('quarter', function ($trail) {
    $trail->push('Quartiers', route('quarter.index'));
});
Breadcrumbs::for('add-quarter', function ($trail) {
    $trail->parent('quarter');
    $trail->push('Ajout quartier');
});
Breadcrumbs::for('edit-quarter', function ($trail, $id) {
    $trail->parent('quarter');
    $trail->push('Modification quartier / '.$id);
});

//Gaz
Breadcrumbs::for('gaz', function ($trail) {
    $trail->push('Gaz', route('gaz.index'));
});
Breadcrumbs::for('add-gaz', function ($trail) {
    $trail->parent('gaz');
    $trail->push('Ajout gaz');
});
Breadcrumbs::for('edit-gaz', function ($trail, $id) {
    $trail->parent('gaz');
    $trail->push('Modification marque gaz / '.$id);
});

//Privilège
Breadcrumbs::for('role', function ($trail) {
    $trail->push('Privilèges', route('role.index'));
});
Breadcrumbs::for('add-role', function ($trail) {
    $trail->parent('role');
    $trail->push('Ajout privilège');
});
Breadcrumbs::for('edit-role', function ($trail, $id) {
    $trail->parent('role');
    $trail->push('Modification privilège / '.$id);
});

//Personnel
Breadcrumbs::for('personal', function ($trail) {
    $trail->push('Personnels', route('personal.index'));
});
Breadcrumbs::for('add-personal', function ($trail) {
    $trail->parent('personal');
    $trail->push('Ajout personnel');
});
Breadcrumbs::for('edit-personal', function ($trail, $id) {
    $trail->parent('personal');
    $trail->push('Modification personnel / '.$id);
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