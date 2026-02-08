<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Petugas')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f5f7fa; }
        .navbar { background:#155E76; }
        .navbar-brand, .nav-link { color:white !important; }
        .card { border:none; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,.1); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Absensi Billman</a>
        <div>
            <span class="text-white me-3">{{ auth()->user()->nama_lengkap }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-light">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container my-4">
    @yield('content')
</div>

</body>
</html>
