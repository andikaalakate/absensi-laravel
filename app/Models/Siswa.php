<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'siswa_login';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nis',
        'password',
        'email',
        'no_telp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function editable()
    // {
    //     return $this->hasOne(SiswaEditable::class, 'NIS', 'NIS');
    // }

    public function siswaData()
    {
        return $this->hasOne(SiswaData::class, 'nis', 'nis');
    }

    // public function absensi()
    // {
    //     return $this->hasMany(SiswaAbsensi::class, 'NIS', 'NIS');
    // }

    // public function peringkat()
    // {
    //     return $this->hasOne(SiswaPeringkat::class, 'NIS', 'NIS');
    // }
}

