<?php
namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExport implements FromCollection
{
    protected $dari,$sampai;

    public function __construct($dari,$sampai)
    {
        $this->dari=$dari;
        $this->sampai=$sampai;
    }

    public function collection()
    {
        return Attendance::with('user')
            ->whereBetween('tanggal',[$this->dari,$this->sampai])
            ->get()
            ->map(function($a){
                return [
                    'Nama'=>$a->user->nama_lengkap,
                    'Tanggal'=>$a->tanggal,
                    'Status'=>$a->status,
                    'Jumlah Kegiatan'=>$a->jumlah_kegiatan,
                ];
            });
    }
}
