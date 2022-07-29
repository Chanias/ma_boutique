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
Route::get('compte', [App\Http\Controllers\UserController::class, 'compte'])->name('compte');
Route::put('compte/update',  [App\Http\Controllers\UserController::class, 'update'])->name('compte.update');
Route::put('compte/updatePassword',  [App\Http\Controllers\UserController::class, 'updatePassword'])->name('compte.updatePassword');
Route::delete('user/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

//-----------------------------ADMIN-------------------------------
Route::get('admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

//-----------------------------COMMANDES-------------------------------
Route::get('/commande', [App\Http\Controllers\CommandeController::class, 'store'])->name('commande.store');
Route::get('/commande', [App\Http\Controllers\CommandeController::class, 'show'])->name('commande.show');

//-----------------------------ARTICLES-------------------------------
Route::resource('/article', App\Http\Controllers\ArticleController::class);

//-----------------------------CAMPAGNES-------------------------------
Route::resource('/campagne', App\Http\Controllers\CampagneController::class);

//-----------------------------ADRESSE-------------------------------
Route::resource('/adresse', App\Http\Controllers\AdresseController::class);

//-----------------------------FAVORIS-------------------------------
Route::resource('/favoris', App\Http\Controllers\FavorisController::class);

//-----------------------------GAMMES-------------------------------
Route::resource('/gamme', App\Http\Controllers\GammeController::class);

//-----------------------------PANIER-------------------------------
Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
Route::post('panier/ajouter/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
Route::post('panier/modifierQuantite/{id}', [App\Http\Controllers\PanierController::class, 'modifierQuantite'])->name('panier.modifierQuantite');
Route::get('panier/retirer/{id}', [App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
Route::get('panier/vider', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');

//-----------------------------VALIDATION PANIER-------------------------------
Route::resource('validation', App\Http\Controllers\ValidationController::class);
Route::post('validation/livraison', [App\Http\Controllers\ValidationController::class, 'choixLivraison'])->name('validation.choixLivraison');
//-----------------------------HISTOIRE-------------------------------
Route::get('a_propos', [App\Http\Controllers\HomeController::class, 'a_propos'])->name('a_propos');
