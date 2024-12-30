<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profil extends Model
{
    protected $table = 'pengguna_profil';
    protected $primaryKey ='id';

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
