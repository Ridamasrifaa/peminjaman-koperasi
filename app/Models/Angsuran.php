<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;

    protected $table = 'angsurans';

    protected $fillable = [
        'pinjaman_id',
        'angsuran_ke',
        'jumlah',
        'tanggal_bayar'
    ];

    // relasi ke pinjaman
    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
