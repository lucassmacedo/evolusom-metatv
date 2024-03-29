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
Route::get('/meta-atingida', 'StaterkitController@meta_atingida')->name('meta_atingida');
Route::get('/meta-atingida2', 'StaterkitController@meta_atingida2')->name('meta_atingida2');
Route::get('/capilaridade', 'StaterkitController@ranking_capilaridade')->name('capilaridade');
Route::get('/produtos-mes', 'StaterkitController@produtos_mes')->name('produtos-dia');
Route::get('/produtos-dia', 'StaterkitController@produtos_dia')->name('produtos-mes');
Route::get('/meta-equipes', 'StaterkitController@meta_equipes')->name('meta_equipes');
Route::get('/evus', 'StaterkitController@evos')->name('evus');
Route::get('/campanha-temporaria1', 'StaterkitController@temporario1')->name('campanha-temporaria1');
Route::get('/campanha-temporaria2', 'StaterkitController@temporario2')->name('campanha-temporaria2');
Route::get('/campanha-temporaria3', 'StaterkitController@temporario3')->name('campanha-temporaria3');
Route::get('/iberostar1', 'StaterkitController@iberostar')->name('iberostar1');
Route::get('/iberostar2', 'StaterkitController@iberostar2')->name('iberostar2');
Route::get('/voice', 'StaterkitController@voice')->name('voice');
Route::get('/evoluir', 'StaterkitController@evoluir')->name('evoluir');

