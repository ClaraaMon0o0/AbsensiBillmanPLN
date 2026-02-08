<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttendanceController as AdminAttendance;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboard;
use App\Http\Controllers\Petugas\AttendanceController as PetugasAttendance;
use App\Http\Controllers\Petugas\ProfileController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect()->route('login'));

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect('/login'));

Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'cekperan:Admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Monitoring Absensi
    Route::get('/absensi', [AdminAttendance::class, 'index'])->name('absensi');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Kontrol Akses Absen
    Route::get('/kontrol-absen', [SystemController::class, 'kontrolForm'])->name('kontrol.form');
    Route::post('/kontrol-absen', [SystemController::class, 'kontrolProses'])->name('kontrol.proses');

    // Export Excel
    Route::get('/export', [SystemController::class, 'exportForm'])->name('export.form');
    Route::post('/export', [SystemController::class, 'exportProses'])->name('export.proses');
});

/*
|--------------------------------------------------------------------------
| PETUGAS ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'cekperan:Petugas'])->prefix('petugas')->name('petugas.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [PetugasDashboard::class, 'index'])->name('dashboard');

    // Absensi
    Route::get('/absen', [PetugasAttendance::class, 'form'])->name('absen.form');
    Route::post('/absen', [PetugasAttendance::class, 'store'])->name('absen.store');
    Route::get('/riwayat', [PetugasAttendance::class, 'riwayat'])->name('riwayat');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
