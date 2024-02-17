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
    protected $casts = [
        'lokasi_masuk' => 'json',
    ];
    protected $fillable = [
        'nis',
        'jam_masuk',
        'jam_pulang',
        'lokasi_masuk',
        'status'
    ];

    public function siswaAbsensi()
    {
        return $this->belongsTo(SiswaAbsensi::class, 'nis', 'nis');
    }
    public function siswaData()
    {
        return $this->belongsTo(SiswaData::class, 'nis', 'nis');
    }
    public function siswaLogin()
    {
        return $this->belongsTo(SiswaLogin::class, 'nis', 'nis');
    }

    public function siswaBio()
    {
        return $this->belongsTo(SiswaBio::class, 'nis', 'nis');
    }
}
