<?php


// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

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