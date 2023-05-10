<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\NewsStandardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Affichage des news pour le client ou le visiteur

Route::get('/newsstandard', [NewsStandardController::class , 'index'])->name('news.standard');

Route::get('/newsstandard/{actu}', [NewsStandardController::class , 'detail'])->name ('news.standard.detail');

Route::get('/newsstandard/category/{id}', [NewsStandardController::class , 'index'])->name ('news.standard.category');
//fin affichage news clients



Route::get('/news', function () {
    return view('adminnews.news');
});
Route::get('/news', [NewsController::class , 'index'])->name('news.all');
Route::get('/news/{id}', [NewsController::class , 'detail'])->name ('news.detail');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route sécurisé pour la gestion des News
Route::middleware(['auth' , 'can:admin'])->group(function () {

//route pour ajouter
Route::get('admin/news/add', [AdminNewsController::class , 'formAdd'])->name ('news.add');
Route::post('admin/news/add', [AdminNewsController::class , 'add'])->name ('news.add');

//route pour modifier ou editer
Route::get('admin/news/edit/{id}', [AdminNewsController::class , 'formEdit'])->name ('news.edit');
Route::post('admin/news/edit/{id}', [AdminNewsController::class , 'edit'])->name ('news.edit');

//route pour supprimer
Route::get('admin/news/list', [AdminNewsController::class , 'index'])->name ('news.list');
Route::get('admin/news/delete/{id}', [AdminNewsController::class , 'delete'])->name ('news.delete');

    
});


    

require __DIR__.'/auth.php';
