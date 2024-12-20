<?php

namespace App\Http\Controllers;


use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class LaporanController extends Controller
{
    public function index()
{
    $user = Auth::user();

    if ($user->level === 'admin') {
        $pembayaran = Pembayaran::all();
    } else {
        // Ubah query untuk user wajib retribusi
        $pembayaran = Pembayaran::where('nama_pemilik_rekening', $user->name)
                               ->orWhere('id_user', $user->id)
                               ->get();
    }

    return view('wajibretribusi.laporan', compact('pembayaran'));
}

public function exportPdf()
{
    $user = Auth::user();

    if ($user->level === 'admin') {
        $pembayaran = Pembayaran::all();
    } else {
        // Sesuaikan juga query untuk export PDF
        $pembayaran = Pembayaran::where('nama_pemilik_rekening', $user->name)
                               ->orWhere('id_user', $user->id)
                               ->get();
    }

    $pdf = Pdf::loadView('wajibretribusi.pdf', compact('pembayaran'));
    return $pdf->download('laporan_pembayaran.pdf');
}
}
