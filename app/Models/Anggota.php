<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model

{
    protected $table = 'anggota'; // Nama tabel di database
    protected $primaryKey = 'id';  // Nama kolom primary key
    protected $fillable = ['nama', 'email', 'no_hp', 'id_users'];

public function pinjaman()
{
    return $this->hasMany(\App\Models\Pinjaman::class, 'anggota_id');
}
}


