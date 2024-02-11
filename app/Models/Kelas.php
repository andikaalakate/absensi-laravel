<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    public function siswaData()
    {
        return $this->hasMany(SiswaData::class, 'kelas', 'nama_kelas')
            ->where('variabel_kelas', $this->variabel_kelas);
    }

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'id_kelas', 'id_kelas');
    }
}
