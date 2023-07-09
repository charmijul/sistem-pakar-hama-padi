<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HamaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KelolaHamaController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KelolaGejalaController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/gejala', [GejalaController::class, 'index']);
Route::get('/hama', [HamaController::class, 'index']);

Route::get('/konsultasi', [KonsultasiController::class, 'index']);
Route::post('/konsultasi/hasil', [KonsultasiController::class, 'proses']);

Route::get('/tambah-user', [UserController::class, 'tambah']);
Route::get('/login', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::resource('/kelola-gejala',  KelolaGejalaController::class);
Route::resource('/kelola-hama',  KelolaHamaController::class);