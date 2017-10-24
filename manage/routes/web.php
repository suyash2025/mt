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

Route::get('/', 'FirstController@index');
Route::post('/', array('as'=>'first.post','uses'=>'FirstController@store'));

Route::get('/b/{id}', 'PostController@show');
Route::post('/c/{id}', 'PostController@store');

Route::get('/image-upload-with-validation',['as'=>'getimage','uses'=>'ImageController@getImage']);
Route::post('/image-upload-with-validation',['as'=>'postimage','uses'=>'ImageController@postImage']);

Route::get('/summernote',array('as'=>'summernote.get','uses'=>'FileController@getSummernote'));

Route::post('/summernote',array('as'=>'summernote.post','uses'=>'FileController@postSummernote'));

Route::get('/first', 'FirstController@index');

Route::post('/second',array('as'=>'second.post','uses'=>'FirstController@store'));

