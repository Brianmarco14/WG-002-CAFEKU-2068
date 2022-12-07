<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/perhitunganPesanan', [DasboardController::class, 'store']);

//GROUP ROUTE UNTUK MASUK KE HALAMAN YANG BIDA DIAKSES OLEH ADMIN DAN OWNER
Route::middleware(['auth'])->group(function () {
    //ROUTE UNTUK MASUK KE HALAMAN DASBOARD
    Route::resource('dashboard', DasboardController::class);

    //ROUTE UNTUK MASUK KE HALAMAN MENU
    Route::resource('menu', MenuController::class);
    
    //ROUTE UNTUK MASUK KE HALAMAN KATEGORI
    Route::resource('kategori', KategoriController::class);
});

//GROUP ROUTE UNTUK MASUK KE HALAMAN YANG BIDA DIAKSES OLEH OWNER
Route::middleware(['auth', 'owner'])->group(function () {
    
    //ROUTE UNTUK MASUK KE HALAMAN USER
    Route::resource('user', UserController::class);
});

//ROUTE UNTUK MASUK KE HALAMAN BERANDA
Route::resource('/', LandingController::class);
