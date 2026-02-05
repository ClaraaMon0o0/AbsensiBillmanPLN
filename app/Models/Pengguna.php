<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pengguna extends Authenticatable
{
    use HasUuids;

    protected $table = 'pengguna';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'peran_id',
        'nama_lengkap',
        'email',
        'kata_sandi',
        'foto',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    public function peran()
    {
        return $this->belongsTo(Peran::class, 'peran_id');
    }
}
