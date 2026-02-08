@extends('layouts.admin')
@section('title','Export Laporan')

@section('content')
<h4>Export Laporan Absensi</h4>

<form action="{{ route('admin.export.proses') }}" method="POST">
@csrf

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Dari Tanggal</label>
        <input type="date" name="dari" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
        <label>Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3 align-self-end">
        <button class="btn btn-success w-100">Export Excel</button>
    </div>
</div>
</form>
@endsection
