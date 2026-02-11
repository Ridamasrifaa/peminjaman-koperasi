<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    //

    use HasFactory;

    protected $table = 'simpanans';

    protected $fillable = [
        'created_by',
        'anggota_id',
        'jenis_simpanan',
        'jumlah',
        'tanggal'
    ];

    // relasi ke user / anggota
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
