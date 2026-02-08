@extends('layouts.admin')
@section('title','Dashboard Admin')

@section('content')
<h3>Dashboard Admin</h3>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Petugas</h5>
            <h2>{{ $totalPetugas }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Absensi Hari Ini</h5>
            <h2>{{ $absenHariIni }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Absensi</h5>
            <h2>{{ $totalAbsensi }}</h2>
        </div>
    </div>
</div>
@endsection
