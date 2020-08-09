<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('sample', function(){
    return view('sample');
});



/***
 *      NKD ROUTES
 */

Route::get('/clients', 'Nkd\ClientController@index')->name('client.index');
Route::get('/Ajouter-un-client', 'Nkd\ClientController@create')->name('client.create');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Stromae')->group(function (){
    Route::delete('/countries/delete-country/{id}', 'CountryController@destroy')->name('country.destroy');
    Route::delete('/cities/delete-city/{id}', 'CityController@destroy')->name('city.destroy');
    Route::delete('/arrondissements/delete-arrondissement/{id}', 'ArrondissementController@destroy')->name('arrondissement.destroy');
    Route::delete('/quarters/delete-quarter/{id}', 'QuarterController@destroy')->name('quarter.destroy');
    Route::delete('/roles/delete-role/{id}', 'RoleController@destroy')->name('role.destroy');
    Route::delete('/gaz/delete-gaz/{id}', 'GazController@destroy')->name('gaz.destroy');
});

Route::layout('layouts.master')->group(function () {
    /*Country*/
    Route::livewire('/countries', 'stromae.country.list-country')->name('country.index');
    Route::livewire('/countries/add-country', 'stromae.country.create')->name('country.create');
    Route::livewire('/countries/edit-country/{id}', 'stromae.country.edit')->name('country.edit');

    /*City*/
    Route::livewire('/cities', 'stromae.city.list-city')->name('city.index');
    Route::livewire('/cities/add-city', 'stromae.city.create-city')->name('city.create');
    Route::livewire('/cities/edit-city/{id}', 'stromae.city.edit-city')->name('city.edit');

    /*Arrondissement*/
    Route::livewire('/arrondissements', 'stromae.arrondissement.list-arrondissement')->name('arrondissement.index');
    Route::livewire('/arrondissements/add-arrondissement', 'stromae.arrondissement.create')->name('arrondissement.create');
    Route::livewire('/arrondissements/edit-arrondissement/{id}', 'stromae.arrondissement.edit')->name('arrondissement.edit');

    /*Quarter*/
    Route::livewire('/quarters', 'stromae.quarter.list-quarter')->name('quarter.index');
    Route::livewire('/quarters/add-quarter', 'stromae.quarter.create')->name('quarter.create');
    Route::livewire('/quarters/edit-quarter/{id}', 'stromae.quarter.edit')->name('quarter.edit');

    /*Role*/
    Route::livewire('/roles', 'stromae.role.list-role')->name('role.index');
    Route::livewire('/roles/add-role', 'stromae.role.create')->name('role.create');
    Route::livewire('/roles/edit-role/{id}', 'stromae.role.edit')->name('role.edit');

    /*Gaz*/
    Route::livewire('/gaz', 'stromae.gaz.list-gaz')->name('gaz.index');
    Route::livewire('/gaz/add-gaz', 'stromae.gaz.create')->name('gaz.create');
    Route::livewire('/gaz/edit-gaz/{id}', 'stromae.gaz.edit')->name('gaz.edit');
});


