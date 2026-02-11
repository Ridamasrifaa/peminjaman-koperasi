<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';

    protected $fillable = [
        'anggota_id',
        'approved_by',
        'jumlah_pinjaman',
        'bunga_persen',
        'tenor',
        'status',
        'tanggal_pinjaman',
        'total_pinjaman',
        'tujuan_pinjaman'
        
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
    protected static function booted()
{
    static::creating(function ($pinjaman) {
        $bunga = 2; // tetap 2%
        $pinjaman->total_pinjaman = $pinjaman->jumlah_pinjaman + ($pinjaman->jumlah_pinjaman * $bunga / 100);

        if (!$pinjaman->status) {
            $pinjaman->status = 'pending';
        }
    });
}

}
