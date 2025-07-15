<?php

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
        Schema::create('pesan_sekarangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_layanan')->nullable();
            $table->integer('id_pelanggan')->nullable();
            $table->string('lokasi');
            $table->date('tanggal');
            $table->string('kontak');
            $table->string('catatan')->nullable();
            $table->string('status');
            $table->string('kode');
            $table->string('alasan');
            $table->integer('id_teknisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_sekarangs');
    }
};
