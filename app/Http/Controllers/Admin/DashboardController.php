<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPetugas' => User::whereHas('peran', fn($q)=>$q->where('nama_peran','Petugas'))->count(),
            'absenHariIni' => Attendance::whereDate('tanggal', now())->count(),
            'totalAbsensi' => Attendance::count(),
        ]);
    }
}
