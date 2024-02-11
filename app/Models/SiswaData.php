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
        return $this->belongsTo(SiswaData::class, 'nis', 'nis');
    }

    public function siswaKelas()
    {
        return $this->hasOne(Kelas::class, 'nama_kelas', 'kelas');
    }

    public function siswaJurusan()
    {
        return $this->hasOne(Jurusan::class, 'nama_jurusan', 'jurusan');
    }

    public function siswaAbsensi()
    {
        return $this->hasMany(SiswaAbsensi::class, 'nis');
    }

    public function getJumlahHadirAttribute()
    {
        return $this->siswaAbsensi()->where('status', 'Hadir')->count();
    }

    public function getJumlahSakitAttribute()
    {
        return $this->siswaAbsensi()->where('status', 'Sakit')->count();
    }

    public function getJumlahIzinAttribute()
    {
        return $this->siswaAbsensi()->where('status', 'Izin')->count();
    }

    public function getJumlahAlphaAttribute()
    {
        return $this->siswaAbsensi()->where('status', 'Alpha')->count();
    }

    public function getPercentHadirAttribute()
    {
        $totalKehadiran = $this->siswaAbsensi()->count();
        if ($totalKehadiran > 0) {
            $hadirCount = $this->siswaAbsensi()->whereIn('status', ['Hadir', 'Sakit', 'Izin', 'Alpha'])->count();
            return round(($hadirCount / $totalKehadiran) * 100, 2);
        } else {
            return 0;
        }
    }

    public function siswaLogin()
    {
        return $this->belongsTo(SiswaLogin::class, 'nis', 'nis');
    }

    public function siswaBio()
    {
        return $this->belongsTo(SiswaBio::class, 'nis', 'nis');
    }

    public function scopeFilterByKelas($query, $kelas)
    {
        if ($kelas && $kelas !== 'semua') {
            return $query->whereHas('siswaData', function ($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }

        return $query;
    }

    public function scopeFilterBySiswa($query)
    {
        if (request('search')) {
            return $query->where('nama_lengkap', 'like', '%' . request('search') . '%')
                ->orWhere('nis', 'like', '%' . request('search') . '%');
        }
    }
}
