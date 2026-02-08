<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KontrolAkses extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kontrol_akses';
    protected $primaryKey = 'id_kontrol';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_kontrol',
        'sedang_dibuka',
        'waktu_buka',
        'waktu_tutup',
        'diubah_oleh',
    ];

    public function pengubah()
    {
        return $this->belongsTo(User::class, 'diubah_oleh', 'id_pengguna');
    }
}
