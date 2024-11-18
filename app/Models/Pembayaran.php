<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_ref_bank',
        'no_rekening',
        'nama_pemilik_rekening',
        'biaya_retribusi',
        'file_bukti',
        'tanggal_tindak_lanjut',
        'tindak_lanjut_user'
    ];
}
