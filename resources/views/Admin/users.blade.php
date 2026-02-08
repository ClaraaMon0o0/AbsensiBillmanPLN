@extends('layouts.admin')
@section('title','Manajemen Petugas')

@section('content')
<h4>Manajemen User</h4>

<a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Tambah User</a>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Peran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $u->nama_lengkap }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->peran->nama_peran }}</td>
            <td>
                <a href="{{ route('admin.users.edit',$u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.users.delete',$u->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
