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

Route::get('/', 'StaterkitController@ranking_vendas')->name('home');
Route::get('/capilaridade', 'StaterkitController@ranking_capilaridade')->name('capilaridade');
Route::get('/produtos-mes', 'StaterkitController@produtos_mes')->name('produtos-dia');
Route::get('/produtos-dia', 'StaterkitController@produtos_dia')->name('produtos-mes');
Route::get('/meta-equipes', 'StaterkitController@meta_equipes')->name('meta_equipes');
Route::get('/evus', 'StaterkitController@evos')->name('evos');

