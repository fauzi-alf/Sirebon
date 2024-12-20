<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use App\Models\User;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WajibRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wajibretribusi = WajibRetribusi::all();
        return view('admin.wajibRetribusi', compact('wajibretribusi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        $user = User::all();
        return view('admin.wajib-retribusi.create', compact('kelurahan','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'no_hp' => 'required|string|max:16',
            'nik' => 'required|string|max:16|unique:wajib_retribusi,nik',
            'alamat' => 'required|string',
            'id_kelurahan' => 'required|exists:kelurahan,id',
            'status' => 'required|in:A,B',

        ]);
         // Buat data User
         $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'retribusi',
            'id_user_group' => 2,
            'remember_token' => Str::random(60),
        ]);
        WajibRetribusi::create([
            'id_user' => auth()->id(),
            'id' => $user->id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'id_kelurahan' => $request->id_kelurahan,
            'status' => $request->status,
        ]);
    
        return redirect()->route('WajibRetribusi.index')->with('success', 'Data rekening berhasil ditambahkan.');
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
        $wajibretribusi = WajibRetribusi::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('admin.wajib-retribusi.edit', compact('wajibretribusi', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wajibRetribusi = WajibRetribusi::findOrFail($id);
        $user = $wajibRetribusi->user;

        $request->validate([
            'name' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'username' => "required|string|max:255|unique:users,username,{$user->id},id",
        'email' => "required|string|email|max:255|unique:users,email,{$user->id},id",
        'no_hp' => 'required|string|max:16',
        'nik' => "required|string|max:16|unique:wajib_retribusi,nik,{$wajibRetribusi->id},id",
        'alamat' => 'required|string',
        'id_kelurahan' => 'required|exists:kelurahan,id',
        'status' => 'required|in:A,B',

        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        $wajibRetribusi->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'id_kelurahan' => $request->id_kelurahan,
            'status' => $request->status,
        ]);
    
        return redirect()->route('WajibRetribusi.index')->with('edit', 'Data rekening berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wajibretribusi = WajibRetribusi::findOrFail($id);
        $wajibretribusi->delete();
        return redirect()->route('WajibRetribusi.index')->with('hapus', 'Data berhasil dihapus.');
    }
}
