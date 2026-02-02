<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model

{
    protected $table = 'anggota'; // Nama tabel di database
    protected $primaryKey = 'id';  // Nama kolom primary key
    protected $fillable = ['nama', 'alamat','no_hp']; // kolom yang bisa diisi
}


