<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionPlanController;
use App\Models\SubscriptionPlan;


Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/welcome', [WebController::class, 'welcome'])->name('welcome');

// Route::get('/pricing', [WebController::class, 'pricing'], )->name('pricing');

Route::get('/pricing', function () {
    $plans = SubscriptionPlan::all();
    return view('pricing', compact('plans'));
})->name('pricing');

Route::get('/feedback', [WebController::class, 'feedback'])->name('feedback');

// -------------------------------------------------------------------------------------------------------------------------------------

Route::get('/subscription', function () {
    $plans = SubscriptionPlan::all();
    return view('subscription-plans', compact('plans'));
})->name('subscription-plans');


Route::get('/subscribe/{id}', function ($id) {
    // Handle subscription logic here
    return redirect()->route('subscription-plans')->with('success', 'You have subscribed successfully!');
})->name('subscribe');

// -------------------------------------------------------------------------------------------------------------------------------

Route::resource('subscription-plans', SubscriptionPlanController::class);

// -----------------------------------------------------------------------------------------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
