<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\penggunaVerif;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    function __construct() {
        $this->middleware('permission:profile-show|profile-tambah|profile-edit|profile-delete|profile-submit|profile-update', ['only' => ['checkProfile','submmit']]);
        $this->middleware('permission:profile-tambah',['only'=>['tambah']]);
        $this->middleware('permission:profile-edit',['only'=>['edit']]);
        $this->middleware('permission:profile-delete',['only'=>['delete']]);
        $this->middleware('permission:profile-update',['only'=>['update']]);
    }

    function checkProfil()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();


        // Cek apakah user sudah memiliki profil
        if ($user->profil) {
            $profil = $user->profil;
            return view('profil.tampil_sudah', compact('user', 'profil','dataAda','verifikasi'), ['user' => Auth::user()]);
        } else {
            // Jika belum ada profil
            return view('profil.tampil_belum',compact('verifikasi'), ['user' => Auth::user()]);
        }
    }

    function tambah()
    {
        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();
        // Cek apakah user sudah memiliki profil
        return view('profil.tambah',compact('dataAda','verifikasi'));
    }

    function submit(Request $request)
    {
        //perfoto_profilan

        // Validasi input untuk memastikan file yang diunggah adalah gambar
        $request->validate([
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Proses gambar jika diunggah
        if ($request->hasFile('foto_profil')) {
            $foto_profil = $request->file('foto_profil');
            $foto_profilName = time() . '.' . $foto_profil->getClientOriginalExtension();
            $foto_profil->move(public_path('img/profil'), $foto_profilName);
        } else {
            $foto_profilName = null;
        }

        $profil = new Profil();
        $profil->user_id = Auth::id();
        $profil->foto_profil = $foto_profilName;
        $profil->telepon = $request->telepon;
        $profil->deskripsi = $request->deskripsi;
        $profil->save();

        return redirect()->route('profil.tampil');
    }

    function edit($id)
    {
        // Ambil user yang sedang login
        $user = Auth::user();
        $profil = Profil::find($id);
        $users = User::find($id);

        $user = Auth::user();
        $verifikasi = PenggunaVerif::where('user_id', $user->id)->first();

       

        $user_id = Auth::id();  
        $dataAda = penggunaVerif::where('user_id', $user_id)->first();  
        return view('profil.edit', compact('user', 'profil','users','dataAda','verifikasi'));
    }


    function update(Request $request, $id)
    {
        $profil = Profil::find($id);

        // Periksa apakah ada file foto yang diunggah
        if ($request->hasFile('foto_profil')) {
            $foto_profil = $request->file('foto_profil');

            // Simpan foto_profil baru di direktori 'public/img/kendaraan'
            $newFileName = time() . '_' . $foto_profil->getClientOriginalName();
            $foto_profil->move(public_path('img/profil'), $newFileName);

            // Update path foto_profil di database
            $profil->foto_profil = $newFileName;

        }

        $profil->telepon = $request->telepon;
        $profil->deskripsi = $request->deskripsi;
        $profil->update();

        return redirect()->route('profil.tampil');
    }

    function delete($id) {
        $profil = Profil::find($id);
        $profil->delete();
        return redirect()->route('profil.tampil');
    }
}
