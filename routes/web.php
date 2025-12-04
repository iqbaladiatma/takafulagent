<?php

use App\Http\Controllers\AgenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman profil agen
Route::get('/agen/{kode}', [AgenController::class, 'show'])->name('agen.show');
