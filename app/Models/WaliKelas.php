<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    protected $table = 'wali_kelas';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'nama',
        'username',
        'email',
        'no_telp',
        'password',
        'id_kelas'
    ];

    public function siswaKelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
