<?php


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Acceuil', route('home'));
});
