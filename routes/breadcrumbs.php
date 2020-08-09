<?php


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Dashboard', route('home'));
});

// Home
Breadcrumbs::for('country', function ($trail) {
    $trail->push('Countries', route('country.index'));
});
