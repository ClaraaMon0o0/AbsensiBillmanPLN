<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Absensi Billman PLN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #155E76, #149BB1);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .card {
            background:#fff;
            width:100%;
            max-width:360px;
            padding:2rem;
            border-radius:14px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }
        h2 { text-align:center; color:#155E76; }
        input {
            width:100%;
            padding:10px;
            margin:8px 0;
            border-radius:8px;
            border:1px solid #ccc;
        }
        button {
            width:100%;
            background:#155E76;
            color:white;
            border:none;
            padding:10px;
            border-radius:8px;
            font-weight:bold;
            cursor:pointer;
        }
        button:hover { background:#0f4a5d; }
        .error { color:red; font-size:14px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Absensi Billman PLN</h2>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>
</div>

</body>
</html>
