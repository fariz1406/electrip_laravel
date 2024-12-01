<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-user', ['only' => ['jumlah',]]);

    }

    function jumlah()
    {
    $jumlahUser = DB::table('users')->count();
    $jumlahPesanan = DB::table('pesanan')->count();
    $jumlahPesananRiwayat = DB::table('pesanan_riwayat')->count();
    $jumlahMobil = DB::table('kendaraan')->where('kategori_id', '1')->count();
    $jumlahMotor = DB::table('kendaraan')->where('kategori_id', '2')->count();


        return view('/admin/dashboard_admin', compact('jumlahUser', 'jumlahPesanan', 'jumlahPesananRiwayat', 'jumlahMobil', 'jumlahMotor'));
    }
}
