<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pesanan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\penggunaVerif;



class pesananController extends Controller
{

    function checkout($id)
    {
        $kendaraan = Kendaraan::find($id);
        $pesanan = Pesanan::find($id);
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        return view('pesanan.checkout', compact('pesanan', 'kendaraan','dataAda'));
    }

    function submit(Request $request, $id)
    {   
        $kendaraan = Kendaraan::find($id);
        $kendaraan_id = $kendaraan->id;
        $kendaraan_biaya = $kendaraan->harga;
        $pesanan = new Pesanan();

        $pesanan->kendaraan_id = $kendaraan_id;
        $pesanan->user_id = Auth::id();
        $pesanan->pesan = $request->pesan;
        $pesanan->waktu = $request->waktu;
        $pesanan->lokasi = $request->lokasi;
        $pesanan->biaya = $kendaraan_biaya;
        $pesanan->save();

        return redirect()->route('pesanan.belumDibayar');
    }

    function tampil()
    {
        $pesanan = Pesanan::get();
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        return view('admin/pesanan/tampil', compact('pesanan','dataAda'));
    }

    function belumDibayar(Request $request)
    {
        // Ambil ID pengguna dari session
        $user = Auth::user();
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();


        // Ambil data pesanan yang belum dibayar
        $dataPesanan = Pesanan::where('user_id', $user->id)
            ->where('status', 'belum_dibayar')
            ->with('kendaraan')
            ->get();

        return view('pesanan/pesanan', compact('dataPesanan','dataAda','verifikasi'));
    }

    function diProses(Request $request)
    {
        // Ambil ID pengguna dari session
        $user = Auth::user();
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();


        // Ambil data pesanan yang belum dibayar
        $dataPesanan = Pesanan::where('user_id', $user->id)
            ->where('status', 'diproses')
            ->with('kendaraan')
            ->get();

        return view('pesanan/pesanan', compact('dataPesanan','dataAda','verifikasi'));
    }

    function diKirim(Request $request)
    {
        // Ambil ID pengguna dari session
        $user = Auth::user();
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();


        // Ambil data pesanan yang belum dibayar
        $dataPesanan = Pesanan::where('user_id', $user->id)
            ->where('status', 'dikirim')
            ->with('kendaraan')
            ->get();

        return view('pesanan/pesanan', compact('dataPesanan','dataAda','verifikasi'));
    }

    function diPakai(Request $request)
    {
        // Ambil ID pengguna dari session
        $user = Auth::user();
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();


        // Ambil data pesanan yang belum dibayar
        $dataPesanan = Pesanan::where('user_id', $user->id)
            ->where('status', 'dipakai')
            ->with('kendaraan')
            ->get();

        return view('pesanan/pesanan', compact('dataPesanan','dataAda','verifikasi'));
    }

}
