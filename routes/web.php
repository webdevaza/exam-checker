<?php

use App\Http\Controllers\AnswerKeyController;
use App\Http\Controllers\ProfileController;
use App\Models\AnswerKey;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-qcount', function () {
    return view('add-qcount');
})->middleware(['auth', 'verified'])->name('add-qcount');

Route::post('/add-exam', [AnswerKeyController::class, 'addExam'])->middleware(['auth', 'verified'])->name('add-exam');

Route::resource('exam', AnswerKeyController::class)->middleware(['auth', 'verified'])->only(['store', 'index', 'edit', 'update', 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
