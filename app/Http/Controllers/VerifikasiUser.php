<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\penggunaVerif;

class VerifikasiUser extends Controller
{

    public function __construct() {
        $this->middleware('permission:verif', ['only' => ['index','beranda','store']]);
        $this->middleware('permission:create-verif',['only' => ['create']]);
    }

    public function beranda()
    {
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();


        if (!session()->has('first_login_done')) {
            session(['first_login_done' => true]);
            return view('beranda', compact('dataAda'))->with('isFirstLogin', true);
        }
        return view('beranda', compact('dataAda'))->with('isFirstLogin', false);
    }

    public function index()
    {
        // Mengambil pengguna saat ini  
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();


        if ($dataAda) {
            return view('verifikasi.verifikasi-sudah', compact('dataAda','verifikasi'));
        } else {
            return view('verifikasi.verifikasi', compact('dataAda','verifikasi'));
        }

        return view('verifikasi.verifikasi', compact('dataAda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kelamin' => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sim' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        if ($dataAda) {
            return redirect()->back()->with('error', 'Akun Anda Sudah Pernah Verifikasi Sebelumnya.');
        }

        // Proses penyimpanan foto  
        $fotoKTP = $request->file('foto_ktp');
        $fotoSIM = $request->file('foto_sim');


        $fotoKTPName = time() . '_ktp_' . $fotoKTP->getClientOriginalName();
        $fotoSIMName = time() . '_sim_' . $fotoSIM->getClientOriginalName();

        $fotoKTP->move(public_path('img/ktp'), $fotoKTPName);
        $fotoSIM->move(public_path('img/sim'), $fotoSIMName);

        // Simpan data pengguna verifikasi  
        penggunaVerif::create([
            'user_id' => $user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'kelamin' => $request->kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'foto_ktp' => 'img/ktp/' .$fotoKTPName,
            'foto_sim' => 'img/sim/' .$fotoSIMName,
        ]);

        return redirect()->route('beranda')->with('success', 'Data Anda Berhasil Disimpan.');
    }
}
