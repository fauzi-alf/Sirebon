<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    
    protected $table = 'pembayaran';
    protected $fillable = [
        'id_ref_bank',
        'id_user',
        'no_rekening',
        'nama_pemilik_rekening',
        'biaya_retribusi',
        'file_bukti',
        'tanggal_tindak_lanjut',
        'tindak_lanjut_user',
        'status',
    ];
    protected $casts = [
        'tanggal_tindak_lanjut' => 'datetime',
    ];
}
