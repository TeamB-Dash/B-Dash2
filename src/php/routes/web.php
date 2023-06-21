<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonthlyReportController;
use App\Models\MonthlyReport;


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

Route::resource('/questions', QuestionController::class);
Route::get('/questions/users/{id}',[QuestionController::class,'showMyQuestions'])->name('questions.showMyQuestions');
Route::get('/questions/users/{id}/drafts',[QuestionController::class,'showMyDraftQuestions'])->name('questions.showMyDraftQuestions');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/articles', ArticleController::class)
    ->middleware('auth');
Route::resource('/articles', ArticleController::class)
    ->only(['show']);

    Route::get('/articles/users/{id}',[ArticleController::class,'showArticles'])->name('articles.myblog');

require __DIR__.'/auth.php';

// 月報関連のルート
Route::get('/monthly_reports', [MonthlyReportController::class, 'index'])->name('monthlyReport.index');
Route::get('/monthly_reports/create', [MonthlyReportController::class, 'create'])->name('monthlyReport.create');
Route::get('/monthly_reports/{monthlyReport}', [MonthlyReportController::class, 'show'])->name('monthlyReport.show');

