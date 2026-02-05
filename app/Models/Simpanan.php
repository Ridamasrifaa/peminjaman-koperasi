<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    protected $table = 'simpanan'; // NAMA TABEL ASLI
    protected $primaryKey = 'id';

    protected $fillable = [
        'anggota_id',
        'jumlah'
    ];

    public $timestamps = true;
}
