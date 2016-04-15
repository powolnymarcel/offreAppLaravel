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

//Le pts d'interogation indique que le param est optionnel 
Route::get('/{auteur?}',[
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


Route::get('/recuemail/{auteur_nom}',[
    'uses'=>'OffresController@receptionMailCallback',
    'as'=>'mail_callback'
]);

Route::get('/admin/login',[
    'uses'=>'AdminController@getLogin',
    'as'=>'admin.login'
]);
Route::post('/admin/login',[
    'uses'=>'AdminController@postLogin',
    'as'=>'admin.login'
]);

Route::get('/admin/dashboard',[
    'uses'=>'AdminController@getDashboard',
    'as'=>'admin.dashboard'
]);





Route::get('/admin/logout',[
    'uses'=>'AdminController@getLogout',
    'as'=>'admin.logout'
]);































