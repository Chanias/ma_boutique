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



Auth::routes();



//-----------------------------ACCUEIL-------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//-----------------------------USER-------------------------------
Route::resource('/compte', App\Http\Controllers\UserController::class);
//-----------------------------COMMANDE-------------------------------
Route::resource('/commande', App\Http\Controllers\CommandeController::class);
//-----------------------------ARTICLE-------------------------------
Route::resource('/article', App\Http\Controllers\ArticleController::class);
//-----------------------------CAMPAGNE-------------------------------
Route::resource('/campagne', App\Http\Controllers\CampagneController::class);
//-----------------------------ADRESSE-------------------------------
Route::resource('/adresse', App\Http\Controllers\AdresseController::class);
//-----------------------------FAVORIS-------------------------------
Route::resource('/favoris', App\Http\Controllers\FavorisController::class);
//-----------------------------GAMMES-------------------------------
Route::resource('/gamme', App\Http\Controllers\GammeController::class);
//-----------------------------ADMIN-------------------------------
Route::get('admin/index',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
