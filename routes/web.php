<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KapalController;
// use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\RekeningController;
// use App\Http\Controllers\Admin\WajibRetribusiController;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\WajibRetribusiController;
use App\Http\Controllers\WajibRetribusiNoCRUDController;
use App\Http\Controllers\KapalkuController;
use App\Http\Controllers\KapalWajibRetribusiController;
use App\Http\Controllers\KategoriRetribusiController;
use App\Http\Controllers\PembayaranRetribusiController;
use App\Http\Controllers\KonfirmasiRetribusiController; 
use App\Http\Controllers\LaporanAdminController;
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
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


Route::post('/change-password', [LoginController::class, 'processChangePassword'])->name('changePassword');



Route::group(['middleware' => ['auth', 'ceklevel:administrator,wajibretribusi']], function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/Home', function () {
        return view('home');
    })->name('home');

    Route::resource('KategoriRetribusi', KategoriRetribusiController::class);
    Route::resource('RekeningPembayaranRetribusi', RekeningController::class);
    Route::get('/LaporanBlmBayar', [LaporanAdminController::class, 'index'])->name('LaporanBlmBayar');
    Route::get('/Laporan', [WajibRetribusiNoCRUDController::class, 'index'])->name('Laporan');
    Route::get('/PembayaranRetribusi', [PembayaranRetribusiController::class, 'index'])->name('PembayaranRetrisbusi');
    Route::get('/KonfirmasiPembayaranretribusi', [KonfirmasiRetribusiController::class, 'index'])->name('KonfirmasiPembayaranRetribusi');
    Route::get('/WajibRetribusi', [WajibRetribusiController::class, 'index'])->name('WajibRetrisbusi');
    Route::get('/KapalWajibRetribusi', [KapalWajibRetribusiController::class, 'index'])->name('kapalWajibRetribusi');
    Route::get('/LaporanRetribusi', [LaporanAdminController::class, 'index2'])->name('LaporanRetribusi');
    Route::get('/Kapalku', [KapalkuController::class, 'index'])->name('Kapalku');
    Route::get('/KapalWajibRetribusiWR', [KapalWajibRetribusiController::class, 'indexWR'])->name('KapalWajibRetribusi');
    
    // Route::get('/Profile', [ProfileController::class, 'index'])->name('Profile');
    // Route::get('/KategoriRetribusiWR',[KategoriRetribusiController::class,'indexWR'])->name('kategoriRetribusi');
    // Route::get('/GantiPassword',[GantiPasswordController::class,'gantiPassword'])->name('GantiPassword');
    // Route::post('/UpdatePassword',[GantiPasswordController::class,'UpdatePassword'])->name('GantiPassword');




});
