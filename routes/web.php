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

// page d'acceuil
Route::get('/','FrontController@index');
// route pour afficher un livre, route sécurisée
Route::get('book/{id}', 'FrontController@show')->where(['id'=>'[0-9]+']);
/*
// retourne l'ensemble des books
Route::get('books', function(){
    return App\Book::all();
});
// retourne une ressource en fonction de son id
Route::get('book/{id}', function($id){
    return App\Book::find($id);
});
*/

Route::resource('admin/book','BookControoler');
// routes sécurisées
Route::resource('admin/book','BookController')->middleware('auth');
