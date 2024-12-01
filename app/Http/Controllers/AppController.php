<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AppController extends Controller
{

    
    public function updatePassword( Request $request){
        
    $request->validate([
        'old_password' => 'required',
        'new_password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/', 
            'regex:/[0-9]/', 
            'regex:/[@$!%*?&#]/',
            'confirmed',
        ],
        ], [
            'old_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru harus memiliki minimal 8 karakter.',
            'new_password.regex' => 'Password baru harus mengandung setidaknya satu huruf besar, satu huruf kecil, satu angka, dan satu karakter spesial (@$!%*?&#).',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }

        auth()->user()->update(['password' => Hash::make($request->new_password)]);

        return back()->with('status', 'Password berhasil diubah');
    }
}
