<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\NotifikasiController;

// Auth Routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register/student', [AuthController::class, 'registerAsStudent']);
    Route::post('register/dosen', [AuthController::class, 'registerAsDosen']);
    Route::post('login', [AuthController::class, 'login']);
    
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('me', [AuthController::class, 'me']);
        Route::get('users', [UserController::class, 'index']);
    });
});

// Protected Business Routes
Route::middleware('auth:api')->group(function () {
    
    // Profiles
    Route::apiResource('mahasiswa', MahasiswaController::class);
    Route::apiResource('dosen', DosenController::class);
    Route::apiResource('admin', AdminController::class);

    // Internship Vacancies
    Route::apiResource('lowongan', LowonganController::class);
    
    // Application Process
    Route::get('pendaftaran', [PendaftaranController::class, 'index']);
    Route::post('pendaftaran', [PendaftaranController::class, 'store']);
    Route::get('pendaftaran/{id}', [PendaftaranController::class, 'show']);
    Route::patch('pendaftaran/{id}/status', [PendaftaranController::class, 'updateStatus']);

    // Active Internship
    Route::apiResource('magang', MagangController::class);
    
    // Logbook & Reporting
    Route::get('magang/{idMagang}/logbook', [LogbookController::class, 'index']);
    Route::post('logbook', [LogbookController::class, 'store']);
    Route::patch('logbook/{id}/validate', [LogbookController::class, 'validateLogbook']);

    Route::get('magang/{idMagang}/laporan', [LaporanController::class, 'index']);
    Route::post('laporan', [LaporanController::class, 'store']);
    Route::patch('laporan/{id}/review', [LaporanController::class, 'review']);

    // Communication
    Route::apiResource('pengumuman', PengumumanController::class)->only(['index', 'store']);
    Route::get('notifikasi', [NotifikasiController::class, 'index']);
    Route::patch('notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead']);
});
