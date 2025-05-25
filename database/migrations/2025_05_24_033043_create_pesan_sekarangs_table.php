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
            $table->string('namalengkap');
            $table->string('email');
            $table->string('nomer');
            $table->string('alamat');
            $table->date('tanggal');
            $table->string('layanan');
            $table->text('catatan')->nullable();
            $table->string('kode');
            $table->string('status');
            $table->string('alasan');
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
