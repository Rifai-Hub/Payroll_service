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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->string('nama', 255);
            $table->string('pekerjaan', 255);
            $table->string('bulan', 255);
            $table->string('tahun', 255);
            $table->bigInteger('gaji_bulananan');
            $table->bigInteger('tunjangan');
            $table->bigInteger('potongan');
            $table->bigInteger('total_gaji');
            $table->enum('status', ['Sudah Dibayar', 'Belum Dibayar'])->default('Belum Dibayar');
            $table->date('tanggal_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};