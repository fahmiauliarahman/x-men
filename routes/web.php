<?php

use App\Http\Controllers\HeroesController;
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

Route::get('/', 'HeroesController@index')->name('heroes.index');
Route::match(['get', 'post'], '/simulasi', 'HeroesController@simulasi')->name('simulasi');
Route::resource('hero', 'HeroesController')->except('index', 'create', 'edit');
Route::resource('hero_skill', 'Heroes_SkillController')->except('index', 'create', 'edit', 'show', 'update');
