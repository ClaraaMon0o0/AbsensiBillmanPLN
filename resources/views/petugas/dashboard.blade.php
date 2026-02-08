@extends('layouts.petugas')

@section('title','Dashboard Petugas')

@section('content')
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card p-4">
            <h5>Absen Hari Ini</h5>
            <p>Isi absensi dan upload bukti foto</p>
            <a href="{{ route('petugas.absen') }}" class="btn btn-primary">Absen Sekarang</a>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card p-4">
            <h5>Riwayat Absensi</h5>
            <p>Lihat histori kehadiran kamu</p>
            <a href="{{ route('petugas.riwayat') }}" class="btn btn-secondary">Lihat Riwayat</a>
        </div>
    </div>
</div>
@endsection
