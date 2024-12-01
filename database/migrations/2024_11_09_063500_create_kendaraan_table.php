<?php

use App\Models\Kategori;
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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kategori::class);
            $table->string('nama')->nullable();
            $table->string('foto')->nullable();
            $table->string('deskripsi')->nullable();
            $table->double('harga')->nullable();
            $table->string('stnk')->nullable();
            $table->integer('tahun')->nullable();
            $table->enum('status', ['tersedia','dipakai'])-> default ('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
