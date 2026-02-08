<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\KontrolAkses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    public function form()
    {
        $kontrol = KontrolAkses::latest()->first();

        if (!$kontrol || !$kontrol->sedang_dibuka) {
            return redirect()->route('petugas.dashboard')->with('error','Absensi sedang ditutup oleh admin.');
        }

        return view('petugas.absen');
    }

    public function store(AttendanceStoreRequest $request)
    {
        $fotoPath = null;

        if ($request->hasFile('bukti_foto')) {
            $fotoPath = $request->file('bukti_foto')->store('absensi', 'public');
        }

        Absensi::create([
            'id' => Str::uuid(),
            'id_pengguna' => Auth::id(),
            'jumlah_kegiatan' => $request->jumlah_kegiatan,
            'bukti_foto' => $fotoPath,
            'status' => $request->status,
            'tanggal' => now()->toDateString(),
            'waktu' => now()->toTimeString(),
        ]);

        return redirect()->route('petugas.riwayat')->with('success','Absensi berhasil disimpan');
    }

    public function riwayat()
    {
        $data = Absensi::where('id_pengguna', Auth::id())
            ->latest()
            ->get();

        return view('petugas.riwayat', compact('data'));
    }
}
