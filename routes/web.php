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

 Route::get('/template', 'TemplateController@index')->name('template');
 Route::get('/create', 'TemplateController@create')->name('create');
 Route::get('/edit/{id}', 'TemplateController@edit')->name('edit');
 Route::get('/assign', 'TemplateController@assign')->name('assign');
 Route::post('/gettemplate', 'TemplateController@gettemplate')->name('gettemplate');
 Route::post('/add_field', 'TemplateController@add_field')->name('add_field');