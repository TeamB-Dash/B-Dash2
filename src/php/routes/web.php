<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

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

Route::resource('articles', ArticleController::class)
    ->middleware('auth');
Route::resource('articles', ArticleController::class)
    ->only(['show']);
Route::get('articles/users/{id}',[ArticleController::class, 'myblog'])->name('articles.myblog');

// Route::get('/articles',[ArticleController::class, 'index'])->name('articles.index');
// Route::get('/articles/{article}',[ArticleController::class, 'show'])->name('articles.show');
// Route::get('/articles/new', [ArticleController::class,'create'])->name('articles.create');
// Route::post('/articles/new', [ArticleController::class,'store'])->name('articles.store');


require __DIR__.'/auth.php';
