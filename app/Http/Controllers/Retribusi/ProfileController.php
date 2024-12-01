<?php

namespace App\Http\Controllers\Retribusi;

use App\Http\Controllers\Controller;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wajibRetribusi = WajibRetribusi::where('id_user', auth()->user()->id)->get();
        // $user = session('user');

    // Ambil data 'nama' dari relasi wajibretribusi
    // $nama = $user->wajibretribusi->nama ?? 'Nama tidak tersedia'; ,'user','nama'

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
    public function update(Request $request, string $id)
    {
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
