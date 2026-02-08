@extends('layouts.petugas')

@section('title','Riwayat Absensi')

@section('content')
<h4>Riwayat Absensi</h4>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Status</th>
            <th>Jumlah Kegiatan</th>
            <th>Bukti</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->waktu }}</td>
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
