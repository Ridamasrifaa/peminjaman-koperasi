<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    protected $table = 'angsuran';

    protected $fillable = [
    'pinjaman_id',
    'cicilan_ke',
    'pokok',
    'bunga',
    'total_bayar',
    'bulan',
    'tahun',
    'tanggal_bayar',
    'status'

    ];

    public function pinjaman()
    {
 return $this->belongsTo(Pinjaman::class, 'pinjaman_id');
    }
    
}