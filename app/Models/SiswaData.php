<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SiswaData extends Model
{
    use HasFactory;

    protected $table = 'siswa_data';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    protected $fillable = [
        'nis',
        'jenis_kelamin',
        'jurusan',
        'kelas',
        'nama_lengkap',
        'tanggal_lahir'
    ];

    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'nis', 'nis');
    }

    public function siswaAbsensi()
    {
        return $this->hasOne(SiswaAbsensi::class, 'nis', 'nis');
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
