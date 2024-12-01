<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VerifikasiUser;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PesananController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ValidasiVerif;
   
  Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');        
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});


    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/submitRegister', [AuthController::class, 'submitRegister'])->name('submitRegister');

    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/submitLogin', [AuthController::class, 'submitLogin'])->name('submitLogin');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
    //pengguna

    Route::get('/beranda', [VerifikasiUser::class, 'beranda'])->name('beranda');


    Route::get('/pilihan', [KendaraanController::class, 'pilihan'])->name('pilihan');
    Route::get('/pilihanMotor', [KendaraanController::class, 'pilihanMotor'])->name('pilihanMotor');

    Route::get('/pesanan/checkout/{id}', [pesananController::class, 'checkout'])->name('pesanan.checkout');
    Route::post('/pesanan/submit/{id}', [pesananController::class, 'submit'])->name('pesanan.submit');
    Route::get('/pesanan/belumDibayar', [pesananController::class, 'belumDibayar'])->name('pesanan.belumDibayar');
    Route::get('/pesanan/diProses', [pesananController::class, 'diProses'])->name('pesanan.diProses');
    Route::get('/pesanan/diKirim', [pesananController::class, 'diKirim'])->name('pesanan.diKirim');
    Route::get('/pesanan/diPakai', [pesananController::class, 'diPakai'])->name('pesanan.diPakai');

    Route::get('/profil', [ProfilController::class, 'checkProfil'])->name('profil.tampil');
    Route::get('/profil/tambah', [ProfilController::class, 'tambah'])->name('profil.tambah');
    Route::post('/profil/submit', [ProfilController::class, 'submit'])->name('profil.submit');
    Route::get('/profil/edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/profil/delete/{id}', [ProfilController::class, 'delete'])->name('profil.delete');


    Route::get('/Verifikasi/User', [VerifikasiUser::class, 'index'])->name('verifikasi.index');
    Route::post('/Verifikasi/User', [VerifikasiUser::class, 'store'])->name('verifikasi.store');
});

Route::middleware('auth', 'role:Admin')->group(function () {
    //admin

    Route::get('/admin/dashboard', [DashboardAdminController::class, 'jumlah'])->name('admin.dashboard');

    Route::get('/admin/userData', function () {
        return view('/admin/data_user');
    })->name('/admin/userData');

    Route::get('/kendaraan', [KendaraanController::class, 'tampil'])->name('kendaraan.tampil');
    Route::get('/kendaraan/tambah', [KendaraanController::class, 'tambah'])->name('kendaraan.tambah');
    Route::post('/kendaraan/submit', [KendaraanController::class, 'submit'])->name('kendaraan.submit');
    Route::get('/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::get('/kendaraan/delete/{id}', [KendaraanController::class, 'delete'])->name('kendaraan.delete');

    Route::get('/admin/pesananData', [pesananController::class, 'tampil'])->name('pesanan.data');

    Route::get('admin/validasi', [validasiVerif::class, 'index'])->name('validasi.verifikasi');
    Route::get('admin/validasi/{id}', [validasiVerif::class, 'show'])->name('validasi.verifikasi.detail');
    Route::put('admin/validasi/{id}', [validasiVerif::class, 'update'])->name('validasi.verifikasi.update');

    Route::get('/admin/usersData', [AuthController::class, 'tampil'])->name('users.tampil');
});
