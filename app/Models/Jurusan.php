<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $guarded = ['id_jurusan'];

    protected $fillable = [
        'id_jurusan',
        'nama_jurusan',
        'alias_jurusan',
        'kepala_jurusan',
    ];

    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'jurusan', 'nama_jurusan');
    }

    public function siswaKelas()
    {
        return $this->hasMany(Kelas::class, 'alias_jurusan', 'alias_jurusan');
    }

    public function scopeFilterByJurusan($query)
    {
        if (request('search')) {
            return $query->where('nama_jurusan', 'like', '%' . request('search') . '%')
                ->orWhere('alias_jurusan', 'like', '%' . request('search') . '%')
                ->orWhere('id_jurusan', 'like', '%' . request('search') . '%');
        }
    }
}
