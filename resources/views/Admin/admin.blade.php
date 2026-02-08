<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f5f7fa; }
        .sidebar { background:#155E76; min-height:100vh; }
        .sidebar a { color:white; text-decoration:none; display:block; padding:10px 15px; }
        .sidebar a:hover { background:#149BB1; }
        .card { border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,.1); }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar p-3">
        <h5 class="text-white mb-4">ADMIN PANEL</h5>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.absensi') }}">Monitoring Absensi</a>
        <a href="{{ route('admin.users') }}">Manajemen User</a>
        <a href="{{ route('admin.export') }}">Export Laporan</a>
        <hr class="text-white">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-light btn-sm w-100">Logout</button>
        </form>
    </div>

    <div class="flex-fill p-4">
        @yield('content')
    </div>
</div>

</body>
</html>
