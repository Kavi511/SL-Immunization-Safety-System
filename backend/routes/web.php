<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdverseEffectController;
use App\Http\Controllers\AdverseEffectLogController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
})->name('home');;

Route::resource('adverse_effects', AdverseEffectController::class)->except(['show']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/adverse_effects/logs', [AdverseEffectLogController::class, 'index'])->name('adverse_effects.logs');
require __DIR__.'/auth.php';
