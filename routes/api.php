<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatkulController;

// Auth Routes
Route::post('/register',
[\App\Http\Controllers\Api\AuthController::class,
'register']);
Route::post('/login',
[\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Routes for Mahasiswa
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/read', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/read/{id}', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy']);

    // Routes for Dosen
    Route::post('/dosen/create', [DosenController::class, 'store']);
    Route::get('/dosen/read', [DosenController::class, 'index']);
    Route::get('/dosen/read/{id}', [DosenController::class, 'show']);
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'destroy']);

    // Routes for Matkul
    Route::post('/matkul/create', [MatkulController::class, 'store']);
    Route::get('/matkul/read', [MatkulController::class, 'index']);
    Route::get('/matkul/read/{id}', [MatkulController::class, 'show']);
    Route::put('/matkul/update/{id}', [MatkulController::class, 'update']);
    Route::delete('/matkul/delete/{id}', [MatkulController::class, 'destroy']);

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);
});
