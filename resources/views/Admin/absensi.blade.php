@extends('layouts.admin')
@section('title','Monitoring Absensi')

@section('content')
<h4>Monitoring Absensi Petugas</h4>

<table class="table table-bordered bg-white mt-3">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Jumlah Kegiatan</th>
            <th>Bukti</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->user->nama_lengkap }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->status }}</td>
            <td>{{ $row->jumlah_kegiatan }}</td>
            <td>
                <a href="{{ asset('storage/'.$row->bukti_foto) }}" target="_blank">Lihat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
