<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\penggunaVerif;
use Spatie\Permission\Models\Role;



class AuthController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:login-1|register-1|logout-1', ['only' => ['tampil']]);
    }

    function tampil()
    {
        $user = User::get();
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        return view('admin.data_user', compact('user', 'dataAda'));
    }


    function register()
    {
        return view('register');
    }
    public function submitRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save(); 

        $user->assignRole('Pengguna');

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    function login()
    {
        return view('login');
    }
    public function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $dataAda = penggunaVerif::where('user_id', $user->id)->first();

            if ($user->hasAnyRole('Admin','Admin Finance')) {
                return redirect()->route('admin.dashboard', compact('dataAda'));
            } elseif ($user->hasRole('Pengguna')) {
                return redirect()->route('beranda', compact('dataAda'));
            } else {
                return redirect()->back()->with('gagal', 'Role tidak ditemukan!');
            }
        } else {
            return redirect()->back()->with('gagal', 'Email atau kata sandi Anda salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
