<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KapalController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\WajibRetribusiController;
use App\Http\Controllers\Retribusi\ProfileController;
use App\Http\Controllers\AppController;


use App\Http\Controllers\Retribusi\GantiPasswordController;
use App\Http\Controllers\PembayaranRetribusiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WajibRetribusiNoCRUDController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KonfirmasiRetribusiController;
use App\Http\Controllers\LaporanAdminController;
use App\Models\WajibRetribusi;

// use App\Http\Controllers\RekeningPembayaranRetribusiController;
// use App\Http\Controllers\GantiPasswordController;

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

Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
 


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
    // return 'Berhasil kirim email notifikasi reset password';
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('rs-completed', 'Reset Password Berhasil, Silahkan Login')
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');





Route::group(['middleware' => ['auth', 'ceklevel:administrator,wajibretribusi']], function () {


    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('Home', [LoginController::class, 'index'])->name('Home');
     
    Route::post('/change-password', [AppController::class, 'updatePassword'])->name('GantiPassword');
    Route::post('/Gantipw', [GantiPasswordController::class, 'update'])->name('GantiPW');
    
    Route::resource('Profile', ProfileController::class);
    Route::resource('KapalWajibRetribusi', KapalController::class);
    Route::resource('KategoriRetribusi', KategoriController::class);
    Route::resource('RekeningPembayaranRetribusi', RekeningController::class);
    Route::resource('WajibRetribusi', WajibRetribusiController::class);
    Route::resource('PembayaranRetribusi', PembayaranRetribusiController::class);
    Route::resource('KonfirmasiPembayaranretribusi', KonfirmasiRetribusiController::class);
    Route::get('/LaporanBlmBayar', [LaporanAdminController::class, 'index'])->name('LaporanBlmBayar');
    Route::get('/CetakLaporanSdhBayar', [LaporanAdminController::class, 'laporansdh'])->name('CetakLaporanSdhBayar');
    Route::get('/CetakLaporanBlmBayar', [LaporanAdminController::class, 'laporanblm'])->name('CetakLaporanBlmBayar');
    Route::get('/Laporan', [WajibRetribusiNoCRUDController::class, 'index'])->name('Laporan');
    Route::get('/CetakLaporan', [WajibRetribusiNoCRUDController::class, 'index1'])->name('CetakLaporan');
    Route::get('/LaporanRetribusi', [LaporanAdminController::class, 'index2'])->name('LaporanRetribusi');
     
});
