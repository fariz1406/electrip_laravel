<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penggunaVerif extends Model
{
    protected $table = 'pengguna_verifikasi';  

    // Tentukan apakah tabel ini memiliki timestamp  
    public $timestamps = true;  

    // Kolom yang dapat diisi  
    protected $fillable = [  
        'user_id',  
        'nama_lengkap',  
        'nik',  
        'kelamin',  
        'tanggal_lahir',  
        'alamat',  
        'foto_ktp',  
        'foto_sim',  
        'validasi'  
    ];  

    // Jika ada relasi dengan model User  
    public function user()  
    {  
        return $this->belongsTo(User::class, 'user_id');  
    }  
}
