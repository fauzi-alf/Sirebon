<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WajibRetribusiController;
use App\Http\Controllers\WajibRetribusiNoCRUDController;
use App\Http\Controllers\KapalkuController;
use App\Http\Controllers\KapalWajibRetribusiController;
use App\Http\Controllers\KategoriRetribusiController;
use App\Http\Controllers\PembayaranRetribusiController;
use App\Http\Controllers\KonfirmasiRetribusiController;
use App\Http\Controllers\RekeningPembayaranRetribusiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanAdminController;

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
    return view('login.login-form');
});
Route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
Route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth','ceklevel:administrator,wajibretribusi']], function (){
    
    Route::get('/Home', function () {
        return view('home');
    })->name('home');
    
    Route::get('/LaporanBlmBayar',[LaporanAdminController::class,'index'])->name('LaporanBlmBayar');
    Route::get('/LaporanRetribusi',[LaporanAdminController::class,'index2'])->name('LaporanRetribusi');
    Route::get('/Profile',[ProfileController::class,'index'])->name('Profile');
    Route::get('/Laporan',[WajibRetribusiNoCRUDController::class,'index'])->name('Laporan');
    Route::get('/KonfirmasiPembayaranretribusi',[KonfirmasiRetribusiController::class,'index'])->name('KonfirmasiPembayaranRetribusi');
    Route::get('/Kapalku',[KapalkuController::class,'index'])->name('Kapalku');
    Route::get('/WajibRetribusi',[WajibRetribusiController::class,'index'])->name('WajibRetrisbusi');
    Route::get('/RekeningPembayaranRetribusi',[RekeningPembayaranRetribusiController::class,'index'])->name('RekeningPembayaranRetrisbusi');
    Route::get('/PembayaranRetribusi',[PembayaranRetribusiController::class,'index'])->name('PembayaranRetrisbusi');
    Route::get('/KapalWajibRetribusi',[KapalWajibRetribusiController::class,'index'])->name('kapalWajibRetribusi');
    Route::get('/KapalWajibRetribusiWR',[KapalWajibRetribusiController::class,'indexWR'])->name('KapalWajibRetribusi');
    Route::get('/KategoriRetribusi',[KategoriRetribusiController::class,'index'])->name('kategoriRetribusi');
    Route::get('/KategoriRetribusiWR',[KategoriRetribusiController::class,'indexWR'])->name('kategoriRetribusi');

    
 

});


