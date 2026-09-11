<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;

// HALAMAN FANS (PUBLIC / SHOTTIES)
Route::get('/', [EventController::class, 'indexFans'])->name('fans.event.index');
Route::get('/event/{id}', [EventController::class, 'showFans'])->name('fans.event.detail');
Route::get('/event/{id}/daftar', [PendaftaranController::class, 'showForm'])->name('fans.pendaftaran.form');
Route::post('/event/daftar', [PendaftaranController::class, 'store'])->name('fans.pendaftaran.store');

Route::view('/tentang', 'fans.tentang')->name('fans.tentang');
Route::view('/kontak', 'fans.kontak')->name('fans.kontak');


// AUTHENTICATION ADMIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ADMIN PANEL (DILINDUNGI SESSION ADMIN)
Route::middleware(['admin.session'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Event
    Route::get('/admin/event', [EventController::class, 'indexAdmin'])->name('admin.event.index');
    Route::post('/admin/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::put('/admin/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/admin/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

    // Data Pendaftaran
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('admin.pendaftaran.destroy');

    // Kelola Admin
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

    // Profil Admin
    Route::get('/profil', [ProfilController::class, 'index'])->name('admin.profil.index');
    Route::put('/profil', [ProfilController::class, 'update'])->name('admin.profil.update');
});
