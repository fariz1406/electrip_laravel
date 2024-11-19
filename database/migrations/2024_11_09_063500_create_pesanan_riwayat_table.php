<?php

use App\Models\Kendaraan;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_riwayat', function (Blueprint $table) {
            $table->integer('id', true);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Kendaraan::class);
            $table->foreignIdFor(Pesanan::class);
            $table->integer('harga_riwayat')->nullable();
            $table->dateTime('tanggal_selesai_riwayat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_riwayat');
    }
};
