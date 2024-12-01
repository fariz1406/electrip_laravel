<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey ='id';

        // method untuk mengambil kendaraan berdasarkan kategori
        // public static function ambilPengguna($pengguna_id)
        // {
        //     return self::where('pengguna_id', $pengguna_id)->get();
        // }
        public function kendaraan()
        {
            return $this->belongsTo(Kendaraan::class, 'kendaraan_id','id');
        }
    
        public function pengguna()
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }
}

