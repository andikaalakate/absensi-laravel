<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaBio extends Model
{
    use HasFactory;

    protected $table = 'siswa_bio';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    protected $fillable = [
        'nis',
        'alamat',
        'biografi',
        'hobi',
        'image',
    ];

    public function siswaBio()
    {
        return $this->hasOne(SiswaBio::class, 'nis', 'nis');
    }
    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'nis', 'nis');
    }
    public function siswaLogin()
    {
        return $this->hasOne(SiswaLogin::class, 'nis', 'nis');
    }
}
