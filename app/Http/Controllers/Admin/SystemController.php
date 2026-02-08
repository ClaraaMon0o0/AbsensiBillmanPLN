<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function exportForm()
    {
        return view('admin.export');
    }

    public function exportProses(Request $r)
    {
        return Excel::download(
            new AttendanceExport($r->dari,$r->sampai),
            'laporan_absensi.xlsx'
        );
    }
}
