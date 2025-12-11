<?php

use App\Http\Controllers\AgenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman daftar semua agen (public)
Route::get('/agen', [AgenController::class, 'index'])->name('agen.index');

// Route untuk halaman profil agen (public)
Route::get('/agen/{kode}', [AgenController::class, 'show'])->name('agen.show');

// User Dashboard (harus login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Agent Dashboard Routes
Route::middleware(['auth', 'verified'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('/', [App\Http\Controllers\Agent\AgentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Agent\AgentDashboardController::class, 'profile'])->name('profile');
    Route::get('/requests', [App\Http\Controllers\Agent\AgentDashboardController::class, 'requests'])->name('requests');
    Route::get('/requests/create', [App\Http\Controllers\Agent\AgentDashboardController::class, 'createRequest'])->name('requests.create');
    Route::post('/requests', [App\Http\Controllers\Agent\AgentDashboardController::class, 'storeRequest'])->name('requests.store');
});

require __DIR__.'/auth.php';
