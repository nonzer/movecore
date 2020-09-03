<?php

use Illuminate\Support\Carbon;
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
Route::get('sample', function(){
    return view('sample');
});

Auth::routes(['register' => false]);


/***
 *      NKD ROUTES
 */

Route::namespace('Nkd')->middleware(['auth', 'lock'])->group(function(){
    Route::get('/client/liste-des-clients', 'ClientController@index')->name('client.index');
    Route::get('/commande/liste-des-commandes', 'CommandeController@index')->name('order.index');
    Route::get('/category/category-des-clients', 'CategoryController@index')->name('category.index');

    Route::delete('/client/Supprimer-un-clients/{id}', 'ClientController@destroy')->name('client.destroy');
    Route::delete('/commandes/Supprimer-un-clients/{id}', 'CommandeController@destroy')->name('order.destroy');
    Route::delete('/category/Supprimer-categorie-clients{id}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('/Montrer-Client/{id}','ClientController@show')->name('customer.show');

});

Route::layout('layouts.master')->middleware(['auth', 'lock'])->group(function(){

   Route::livewire('/Client/Editer-un-client/{id}', 'nkd.client.edit')->name('client.edit');
   Route::livewire('/Client/Ajouter-un-client', 'nkd.client.client')->name('client.create');

   Route::livewire('/Commandes/Ajouter-une-commande', 'nkd.commande.search')->name('order.search');
   Route::livewire('/Commandes/Ajouter-une-commande/{id}', 'nkd.commande.create')->name('order.create');
   Route::livewire('/Commandes/Editer-une-commande/{id}', 'nkd.commande.edit')->name('order.edit');

   Route::livewire('/Client/Ajouter-une-Categorie-de-client', 'nkd.category.create')->name('category.create');
   Route::livewire('/Client/Editer-une-Categorie-de-client/{id}', 'nkd.category.edit')->name('category.edit');

   Route::livewire('/charger-fichier-Excel/', 'nkd.excel.create')->name('excel.client');


});


/***
 *      END NKD ROUTES
 */



/***
 *      STROMAE ROUTES
 */
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'lock'])->group(function (){
    Route::view('/profile', 'auth.profile')->name('profile');

    Route::middleware('ceo')->get('/tableau-de-bord', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('admin')->group(function (){
        Route::get('/invoice-print/{id}', 'Stromae\InvoiceController@printInvoice')->name('invoice-print');

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
            Route::livewire('/quarters/add-quarter', 'stromae.quarter.create-quarter')->name('quarter.create');
            Route::livewire('/quarters/edit-quarter/{id}', 'stromae.quarter.edit-quarter')->name('quarter.edit');

            /*Role*/
            Route::livewire('/roles', 'stromae.role.list-role')->name('role.index');
            Route::livewire('/roles/add-role', 'stromae.role.create-role')->name('role.create');
            Route::livewire('/roles/edit-role/{id}', 'stromae.role.edit-role')->name('role.edit');

            /*Gaz*/
            Route::livewire('/gaz', 'stromae.gaz.list-gaz')->name('gaz.index');
            Route::livewire('/gaz/add-gaz', 'stromae.gaz.create-gaz')->name('gaz.create');
            Route::livewire('/gaz/edit-gaz/{id}', 'stromae.gaz.edit-gaz')->name('gaz.edit');

            /*Personal*/
            Route::livewire('/personal', 'stromae.personal.list-personal')->name('personal.index');
            Route::livewire('/personal/add-personal', 'stromae.personal.create-personal')->name('personal.create');
            Route::livewire('/personal/edit-personal/{id}', 'stromae.personal.edit-personal')->name('personal.edit');
        });
    });

    //Gestion Relation Client
    Route::get('/customer-relation', 'Stromae\CustomerRelationController@index')->name('customer_relation');

    //livraison
    Route::prefix('delivery')->group(function (){
        Route::get('/order-summary', 'Stromae\DeliveryController@order_summary')->name('delivery.order_summary');
        Route::get('/history-delivery', 'Stromae\DeliveryController@history_delivery')->name('delivery.history_delivery');
    });
});


//Verrouillage d'ecran
Route::get('/lockscreen', 'Stromae\LockAccountController@lockscreen')->name('lockscreen.index');
Route::post('/lockscreen', 'Stromae\LockAccountController@unlock')->name('lockscreen.store');

//page d'erreurs
Route::fallback(function (){
    return view('stromae.error_page.404');
});
Route::view('error_page_503', 'stromae.error_page.503')->name('error-503');


/***
 *      END STROMAE ROUTES
 */

//23337036lyd