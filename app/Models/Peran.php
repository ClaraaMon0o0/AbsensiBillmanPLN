<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;

    protected $table = 'peran';
    protected $primaryKey = 'id_peran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_peran',
        'nama_peran',
    ];

    public function pengguna()
    {
        return $this->hasMany(User::class, 'id_peran', 'id_peran');
    }
}
