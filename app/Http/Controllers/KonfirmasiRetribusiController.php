<?php

namespace App\Http\Controllers;
use App\Models\Kapal;
use App\Models\KonfirmasiBayar;
use App\Models\MsRekening;
use App\Models\RefBank;
use App\Models\RefJenisKapal;
use App\Models\WajibRetribusi;
use Illuminate\Http\Request;
class KonfirmasiRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        // Cari data wajib retribusi yang terkait dengan user yang login
        $wajibRetribusi = WajibRetribusi::where('id_user', $userId)->first();

        // Pastikan data wajib retribusi ditemukan
        if ($wajibRetribusi) {
            // Cari data kapal yang terkait dengan wajib retribusi ini
            $kapal = Kapal::where('id_wajib_retribusi', $wajibRetribusi->id)->first();

            // Ambil biaya retribusi dari jenis kapal yang terkait dengan kapal ini
            $biayaRetribusi = $kapal ? RefJenisKapal::where('id', $kapal->id_jenis_kapal)->value('biaya_retribusi') : 0;
        } else {
            $biayaRetribusi = 0;
        }

        $banks = RefBank::all(); 

        return view('wajibretribusi.konfirmasiPembayaranRetribusi', compact('biayaRetribusi', 'banks'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
