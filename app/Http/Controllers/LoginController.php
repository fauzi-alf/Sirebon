<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login.login-form');
       }
    
    
       public function postlogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
           
            
            // session()->flash('login_success');
            return redirect('/Home')->with('success', 'Berhasil Login');
            
        }
        return redirect('/')->with('failedd', 'Username Atau Password Salah ');
       }
    
    
       public function logout( ){
        Auth::logout();
        session()->flash('logout');
        return redirect ('/login')->with('success', 'Berhasil logout');
        
       } 
    //    public function processChangePassword(Request $request){
    //         //cek pw lama
            
    //         if (!Hash::check($request->old_password, auth()->user()->password)) {
    //            return back()->with('error','Password Lama Tidak Sesuai');
    //         } 

            
    //         if ($request->new_password == $request->confirm_password) {
    //             return back()->with('error','Password Baru Dan Konfirmasi Password Tidak Sesuai');
    //         }
    //         auth()->user()->update([
    //             'password' => Hash::make($request->new_password)
    //         ])->with('reset-complete','reset password berhasil');
            
    //    }
}
