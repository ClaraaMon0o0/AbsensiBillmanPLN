<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('admin.absensi', [
            'data'=>Attendance::with('user')->latest()->get()
        ]);
    }
}
