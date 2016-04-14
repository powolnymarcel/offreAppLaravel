<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',[
    'uses'=>'OffresController@recupererIndex',
    'as'=>'index'
]);

Route::post('/creation',[
    'uses'=> 'OffresController@creationoffre',
    'as'=>'creation'
]);

Route::get('/supprimer/{offre_id}',[
    'uses'=>'OffresController@supprimerOffre',
    'as'=>'supprimer'
]);
