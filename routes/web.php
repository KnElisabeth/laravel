<?php

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
    return view('welcome');
});

Auth::routes();

//quand l'utilisateur va sur l'url /home, on utilise le controller 'HomeController' et une méthode qui se nomme 'index' et je lui attribue un nouveau nom 'home'
Route::get('/home', 'HomeController@index')->name('home');

//READ
Route::get('/showMovies', 'MovieController@showTest')->name('show');

//le Middleware (vigile) pour protéger les accès
Route::group(['middleware' => ['auth']], function () {
    
    //CREATE
    Route::get('/createMovies', 'MovieController@createMovie')->name('create');
    Route::post('/storeMovie', 'MovieController@store')->name('storeMovie');
    //erreur 419 car  nécessite le sea surf

    //UPDATE
    Route::post('/editMovie/{id}', 'MovieController@edit')->name('editMovie');
    Route::post('/updateMovie/{id}', 'MovieController@update')->name('updateMovie');

    //DELETE
    Route::post('/deleteMovie/{id}', 'MovieController@delete')->name('deleteMovie');
});



//étape 1 
//==>Autoriser les vues seulement en cas de session
//je n'ai pas accès aux pages si je ne suis pas connecté
//l'encapsulation des routes permet la vérification des l'utilisateur qui a des droits

//étape 2 
//==>Attribuer les droits
//il faut cacher les boutons créer un film / modifier / supprimer
//ces éléments ne seront accessibles qu'aux administrateurs
