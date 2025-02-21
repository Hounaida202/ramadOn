<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\recetteController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CommentaireController;

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




Route::get('/dash', [PublicationController::class, 'show'])->name('publishing');
Route::post('/pub/ajoute', [PublicationController::class, 'save']);
Route::get('/pub/ajoute', [PublicationController::class, 'store'])->name('add_pub');

Route::post('/recette/ajoute', [RecetteController::class, 'save'])->name('save_recipe');
Route::get('/recette/ajoute', [RecetteController::class, 'store'])->name('add_recipe');

Route::get('/recettes', [RecetteController::class, 'show'])->name('recettes');
 
Route::post('/add-comment', [CommentaireController::class, 'store'])->name('add_comment');
Route::get('/comments/{publication_id}', [CommentaireController::class, 'show'])->name('get_comments');

Route::get('/statistics', [PublicationController::class, 'showStatistics'])->name('statistics');

