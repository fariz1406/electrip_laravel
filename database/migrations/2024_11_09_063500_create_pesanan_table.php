<?php

use App\Models\Kendaraan;
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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kendaraan::class);
            $table->foreignIdFor(User::class);
            $table->text('pesan')->nullable();
            $table->dateTime('waktu')->nullable();
            $table->string('lokasi')->nullable();
            $table->decimal('biaya', 10, 0)->nullable();
            $table->enum('status', ['belum_dibayar', 'diproses', 'dikirim', 'dipakai', 'selesai'])->default('belum_dibayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
