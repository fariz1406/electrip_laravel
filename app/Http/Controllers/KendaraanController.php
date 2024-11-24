<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\penggunaVerif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class KendaraanController extends Controller
{

    function tampil()
    {
        $kendaraan = Kendaraan::get();

        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        return view('admin.kendaraan.tampil', compact('kendaraan', 'dataAda'));
    }

    function pilihan(Request $request)
    {
        $kendaraan = new Kendaraan;
        $kendaraan = Kendaraan::ambilKategori('1');
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        return view('pilihanMobil', compact('kendaraan', 'request', 'dataAda'));
    }

    function pilihanMotor(Request $request)
    {
        $kendaraan = new Kendaraan;
        $kendaraan = Kendaraan::ambilKategori('2');
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();


        if ($request->get('search')) {
            $kendaraan = $kendaraan->where('nama', 'like', '%' . $request->get('search') . '%');
        }

        return view('pilihanMotor', compact('kendaraan', 'request', 'dataAda'));
    }


    function tambah()
    {
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();

        return view('admin.kendaraan.tambah', compact('dataAda'));
    }

    function submit(Request $request)
    {
        //perfotoan

        // Validasi input untuk memastikan file yang diunggah adalah gambar
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stnk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses gambar jika diunggah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/kendaraan'), $fotoName);
        } else {
            $fotoName = null;
        }

        if ($request->hasFile('stnk')) {
            $stnk = $request->file('stnk');
            $stnkName = time() . '.' . $stnk->getClientOriginalExtension();
            $stnk->move(public_path('img/stnk'), $stnkName);
        } else {
            $stnkName = null;
        }

        $kendaraan = new Kendaraan();
        $kendaraan->kategori_id = $request->kategori;
        $kendaraan->nama = $request->nama;
        $kendaraan->foto = $fotoName;
        $kendaraan->deskripsi = $request->deskripsi;
        $kendaraan->harga = $request->harga;
        $kendaraan->stnk = $stnkName;
        $kendaraan->tahun = $request->tahun;
        $kendaraan->save();

        return redirect()->route('kendaraan.tampil');
    }

    function edit($id)
    {
        $kendaraan = Kendaraan::find($id);
        $user_id = Auth::id();
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();
        return view('admin.kendaraan.edit', compact('kendaraan', 'dataAda'));
    }

    function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);

        // Periksa apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Simpan foto baru di direktori 'public/img/kendaraan'
            $newFileName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('img/kendaraan'), $newFileName);

            // Update path foto di database
            $kendaraan->foto = $newFileName;
        }

        // Periksa apakah ada file foto yang diunggah
        if ($request->hasFile('stnk')) {
            $stnk = $request->file('stnk');

            // Simpan stnk baru di direktori 'public/img/kendaraan'
            $newStnkName = time() . '_' . $stnk->getClientOriginalName();
            $stnk->move(public_path('img/kendaraan'), $newStnkName);

            // Update path stnk di database
            $kendaraan->stnk = $newStnkName;
        }

        $kendaraan->kategori_id = $request->kategori;
        $kendaraan->nama = $request->nama;
        $kendaraan->deskripsi = $request->deskripsi;
        $kendaraan->harga = $request->harga;
        $kendaraan->tahun = $request->tahun;
        $kendaraan->update();

        return redirect()->route('kendaraan.tampil');
    }

    function delete($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();
        return redirect()->route('kendaraan.tampil');
    }
}
