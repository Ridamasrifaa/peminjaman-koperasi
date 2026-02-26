<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cicilan extends Model
{
    protected $table = 'cicilans';

    protected $fillable = [
        'kredit_id',
        'bulan_ke',
        'jumlah_bayar',
        'status'
    ];
}
