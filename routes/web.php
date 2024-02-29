<?php

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

Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::prefix('letters')->group(function () {
    Route::get('/', \App\Livewire\LettersList::class)->name('letters.list');
    Route::get('/generate/{letter}', \App\Livewire\GenerateLetter::class)->name('letters.generate');
});
