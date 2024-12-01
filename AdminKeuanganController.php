<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminKeuanganController extends Controller
{
    /**
     * Tampilkan dashboard admin keuangan.
     */
    public function dashboard()
    {
        return view('AdminKeuanganController.dashboard');
    }

    /**
     * Tampilkan daftar transaksi.
     */
    public function listTransaksi()
    {
        // Contoh query untuk mengambil data transaksi
        $transaksi = User::table('transaksi')->get();

        return view('AdminKeuanganController.transaksi', compact('transaksi'));
    }

    /**
     * Validasi transaksi.
     */
    public function validasiTransaksi($id)
    {
        // Contoh validasi
        User::table('transaksi')->where('id', $id)->update(['status' => 'valid']);

        return redirect()->route('AdminKeuanganController.transaksi')->with('success', 'Transaksi berhasil divalidasi.');
    }
}
