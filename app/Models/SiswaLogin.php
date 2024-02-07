<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaLogin extends Model
{
    use HasFactory;

    protected $table = 'siswa_login';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    protected $fillable = [
        'nis',
        'email',
        'no_telp',
        'password'
    ];

    public function siswaLogin()
    {
        return $this->hasOne(SiswaLogin::class, 'nis', 'nis');
    }
    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'nis', 'nis');
    }

    public function siswaBio()
    {
        return $this->hasOne(SiswaBio::class, 'nis', 'nis');
    }

}
