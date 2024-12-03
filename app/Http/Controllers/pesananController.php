<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pesanan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\penggunaVerif;
use Carbon\Carbon;



class pesananController extends Controller
{

    function checkout($id)
    {
        $kendaraan = Kendaraan::find($id);
        $pesanan = Pesanan::find($id);
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        return view('pesanan.checkout', compact('pesanan', 'kendaraan', 'dataAda', 'id'));
    }

    function submit(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan_id = $kendaraan->id;
        $harga_kendaraan_perhari = $kendaraan->harga;
        $pesanan = new Pesanan();

        $pesanan->kendaraan_id = $kendaraan_id;
        $pesanan->user_id = Auth::id();
        $pesanan->pesan = $request->pesan;
        $pesanan->tanggal_mulai = $request->tanggal_mulai;
        $pesanan->tanggal_selesai = $request->tanggal_selesai;
        $pesanan->lokasi = $request->lokasi;
        $pesanan->latitude = $request->latitude;
        $pesanan->longitude = $request->longitude;

        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
        // Hitung jumlah hari, minimal 1 hari
        $jumlah_hari = $tanggal_mulai->diffInDays($tanggal_selesai);

        $pesanan->biaya = $jumlah_hari * $harga_kendaraan_perhari;
        $pesanan->save();

        return redirect()->route('pesanan.belumDibayar');
    }

    function tampil()
    {
        $pesanan = Pesanan::get();
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        return view('admin/pesanan/tampil', compact('pesanan', 'dataAda'));
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

        return view('pesanan/pesanan', compact('dataPesanan', 'dataAda', 'verifikasi'));
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

        return view('pesanan/pesanan', compact('dataPesanan', 'dataAda', 'verifikasi'));
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

        return view('pesanan/pesanan', compact('dataPesanan', 'dataAda', 'verifikasi'));
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

        return view('pesanan/pesanan', compact('dataPesanan', 'dataAda', 'verifikasi'));
    }
}
