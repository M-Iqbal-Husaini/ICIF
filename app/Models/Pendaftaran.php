<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'id_ukm', 'nama', 'nim', 'jenis_kelamin', 'jurusan', 'prodi', 'ukm', 'divisi', 'email', 'cv'

    ];
}
