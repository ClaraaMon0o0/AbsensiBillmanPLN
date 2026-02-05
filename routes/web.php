<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'cekperan:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth', 'cekperan:Petugas'])->prefix('petugas')->group(function () {
    Route::get('/dashboard', function () {
        return view('petugas.dashboard');
    });
});
