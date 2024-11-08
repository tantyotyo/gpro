<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\AksesController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AgendoorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TruckingController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('home');})->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/akses', AksesController::class);
Route::resource('/servis', ServisController::class);
Route::resource('/sektor', SektorController::class);
Route::resource('/kota', KotaController::class);
Route::resource('/jenis', JenisController::class);
Route::resource('/rute', RuteController::class);
Route::resource('/pegawai', PegawaiController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/agendoor', AgendoorController::class);
Route::resource('/trucking', TruckingController::class);
Route::resource('/pelayaran', PelayaranController::class);
Route::resource('/kapal', KapalController::class);
Route::resource('/jadwal', JadwalController::class);
Route::resource('/container', ContainerController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/kota', function () {
//     return view('kota.index');
// });
