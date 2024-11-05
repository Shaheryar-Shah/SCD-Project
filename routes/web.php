<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'home');
// Route::view('/welcome', 'welcome');
// Route::view('/pricing', 'pricing');
// Route::view('/feedback', 'feedback');

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/welcome', [WebController::class, 'welcome'])->name('welcome');
Route::get('/pricing', [WebController::class, 'pricing'])->name('pricing');
Route::get('/feedback', [WebController::class, 'feedback'])->name('feedback');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
