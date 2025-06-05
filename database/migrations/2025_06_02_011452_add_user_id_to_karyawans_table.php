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
        Schema::table('karyawans', function (Blueprint $table) {
            // Tambahkan kolom user_id
            // Gunakan nullable() jika ada karyawan yang mungkin tidak terhubung dengan user saat ini
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Hapus foreign key dulu
            $table->dropColumn('user_id');    // Kemudian hapus kolomnya
        });
    }
};