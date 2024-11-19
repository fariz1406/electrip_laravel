<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penggunaVerif;

class validasiVerif extends Controller
{
    public function index()
    {
        // Ambil semua data verifikasi pengguna
        $verifikasiList = penggunaVerif::all();

        // Kirimkan data ke view
        return view('admin.validasi_verifikasi', compact('verifikasiList'));
    }

    public function show($id)
    {
        // Ambil detail data berdasarkan ID
        $verifikasi = penggunaVerif::findOrFail($id);

        // Kirimkan data ke view
        return view('admin.verifikasi_detail', compact('verifikasi'));
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $verifikasi = penggunaVerif::findOrFail($id);

        // Update status validasi berdasarkan input
        $verifikasi->validasi = $request->status;
        $verifikasi->save();

        // Redirect kembali ke halaman list verifikasi
        return redirect()->route('validasi.verifikasi')->with('status', 'Status berhasil diperbarui!');
    }
}
