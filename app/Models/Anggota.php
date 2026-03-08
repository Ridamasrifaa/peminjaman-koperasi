<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'id_users'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users');
    }

    public function pinjaman()
    {
        return $this->hasMany(\App\Models\Pinjaman::class, 'anggota_id');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    // Ambil avatar dari tabel users
    public function getAvatarUrlAttribute()
    {
        return ($this->user && $this->user->foto)
            ? asset('storage/' . $this->user->foto)
            : asset('img/default-avatar.png');
    }

    // Ambil nama dari tabel users (BIAR GAK DOUBLE DATA)
    public function getNamaLengkapAttribute()
    {
        return $this->user->nama ?? $this->nama;
    }
}