@extends('layouts.petugas')

@section('title','Form Absen')

@section('content')
<h4>Form Absensi</h4>

<form action="{{ route('petugas.absen.simpan') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Jumlah Kegiatan</label>
    <input type="number" name="jumlah_kegiatan" class="form-control" required>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="Hadir">Hadir</option>
        <option value="Izin">Izin</option>
        <option value="Sakit">Sakit</option>
        <option value="Cuti">Cuti</option>
    </select>
</div>

<div class="mb-3">
    <label>Bukti Foto (kamera)</label>
    <input type="file" name="bukti_foto" class="form-control"
           accept="image/*" capture="environment" required>
</div>

<button class="btn btn-success">Simpan Absensi</button>
</form>
@endsection
