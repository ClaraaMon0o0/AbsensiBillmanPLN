<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsensiStoreRequest;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Form Absen
    public function form()
    {
        return view('petugas.absen');
    }

    // Simpan Absen
    public function simpan(AbsensiStoreRequest $request)
    {
        $user = Auth::user();

        $path = $request->file('bukti_foto')->store('absensi', 'public');

        Absensi::create([
            'id_pengguna' => $user->id_pengguna,
            'jumlah_kegiatan' => $request->jumlah_kegiatan,
            'bukti_foto' => $path,
            'status' => $request->status,
            'tanggal' => now()->toDateString(),
            'waktu' => now()->toTimeString(),
        ]);

        return redirect()->route('petugas.riwayat')->with('success', 'Absensi berhasil disimpan');
    }

    // Riwayat Absen Petugas
    public function riwayat()
    {
        $data = Absensi::where('id_pengguna', Auth::id())
            ->orderByDesc('tanggal')
            ->get();

        return view('petugas.riwayat', compact('data'));
    }
}
