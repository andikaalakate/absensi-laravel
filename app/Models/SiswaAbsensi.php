<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaAbsensi extends Model
{
    use HasFactory;

    protected $table = 'siswa_absensi';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    protected $fillable = [
        'nis',
        'jam_masuk',
        'jam_pulang',
        'lokasi_masuk',
        'qr_code',
        'status'
    ];

    public function siswaAbsensi()
    {
        return $this->hasOne(SiswaAbsensi::class, 'nis', 'nis');
    }
    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'nis', 'nis');
    }
    public function siswaLogin()
    {
        return $this->hasOne(SiswaLogin::class, 'nis', 'nis');
    }

    public function siswaBio()
    {
        return $this->hasOne(SiswaBio::class, 'nis', 'nis');
    }
}
