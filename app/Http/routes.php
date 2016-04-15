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

//On protege soit une par une ...
//Route::get('/admin/dashboard',[
//    'uses'=>'AdminController@getDashboard',
//    'as'=>'admin.dashboard',
//    'middleware'=>'auth'
//]);
//Route::get('/admin/les-offres',function(){
//    return view('admin.lesOffres');
//})->middleware('auth');

//Soit en groupe :)

Route::group(['middleware'=>'auth'],function(){


    Route::get('/admin/dashboard',[
        'uses'=>'AdminController@getDashboard',
        'as'=>'admin.dashboard'
    ]);
    Route::get('/admin/les-offres',function(){
        return view('admin.lesOffres');
    });

});



Route::get('/admin/logout',[
    'uses'=>'AdminController@getLogout',
    'as'=>'admin.logout'
]);



Route::get('/admin/les-offres',function(){
    return view('admin.lesOffres');
})->middleware('auth');

































