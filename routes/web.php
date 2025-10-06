<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Game;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', [GameController::class, 'index'])->middleware(['auth', 'verified'])->name('games'); // Lesson 3 is where this problem occured



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('\games', [GameController::class, 'index'])->name('games.index');
Route::get('\games\create', [GameController::class, 'create'])->name('games.create');
Route::get('\games\{game}', [GameController::class, 'show'])->name('games.show');
Route::post('\games', [GameController::class, 'store'])->name('games.store');

Route::get('\games\{game}\edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('\games\{game}', [GameController::class, 'update'])->name('games.update');
Route::delete('\games\{game}', [GameController::class, 'destroy'])->name('games.destroy');