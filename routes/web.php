<?php

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
    return view('welcome');
});
Route::get('/', array('as' => 'index','uses' => 'AlbumController@getList'));
Route::get('/createalbum','albumController@getform')->name('create_album_form');
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumController@postCreate'));
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumController@getDelete'));
//Route::DELETE('/deletemovealbum/{delId}/{movId}', array('as' => 'delete_album','uses' => 'AlbumController@getDeleteMove'));
Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumController@getAlbum'));
Route::get('/album/{id}/edit', array('as' => 'edit_album','uses' => 'AlbumController@edit'));
Route::get('/album/{id}/update', array('as' => 'update_album','uses' => 'AlbumController@update'));
Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImageController@getForm'));
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImageController@postAdd'));
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImageController@getDelete'));
