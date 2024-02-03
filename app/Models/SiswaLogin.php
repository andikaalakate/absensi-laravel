<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaLogin extends Model
{
    use HasFactory;

    protected $table = 'siswa_login';

    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'nis', 'nis');
    }

    public function siswaBio()
    {
        return $this->hasOne(SiswaBio::class, 'nis', 'nis');
    }

}
