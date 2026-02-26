<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    protected $table = 'kredits';

    protected $fillable = [
        'user_id',
        'jumlah_kredit',
        'bunga',
        'tenor'
    ];

    public function cicilans()
    {
        return $this->hasMany(Cicilan::class);
    }
}
