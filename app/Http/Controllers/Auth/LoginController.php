<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'kata_sandi' => 'required'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['kata_sandi']])) {
            $request->session()->regenerate();

            $peran = auth()->user()->peran->nama_peran;

            return $peran === 'Admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('petugas.dashboard');
        }

        return back()->withErrors(['email' => 'Login gagal']);
    }
}
