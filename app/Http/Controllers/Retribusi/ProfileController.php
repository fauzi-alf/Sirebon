<?php

namespace App\Http\Controllers\Retribusi;

use App\Http\Controllers\Controller;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wajibRetribusi = WajibRetribusi::where('id_user', auth()->user()->id)->get(); 

        return view ('wajibretribusi.profile',compact('wajibRetribusi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:16',
            'alamat' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();
    
        // Update username pada model user
        $user->username = $request->input('username');
        $user->update();
    
        // Update data pada model WajibRetribusi
        $wajibRetribusi = $user->wajibRetribusi;
    
        // Pastikan $wajibRetribusi tidak null sebelum diakses
        if ($wajibRetribusi) {
            $wajibRetribusi->nik = $request->input('nik');
            $wajibRetribusi->nama = $request->input('nama');
            $wajibRetribusi->no_hp = $request->input('no_hp');
            $wajibRetribusi->alamat = $request->input('alamat');
            $wajibRetribusi->save(); // Simpan perubahan ke database
        }
    
        return redirect()->route('Profile.index')->with('success', 'Profil berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
