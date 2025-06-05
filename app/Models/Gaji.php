<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
   protected $fillable = [
    'karyawan_id',
     'nama',
    'pekerjaan',
    'bulan',
    'tahun',
    'gaji_bulananan',
    'tunjangan',
    'keterangan_tunjangan', // TAMBAHKAN INI
    'potongan',
    'keterangan_potongan', // TAMBAHKAN INI
    'total_gaji',
    'status',
    'tanggal_kirim',
   ];

   public function karyawan()
    {
        // Gaji dimiliki oleh satu Karyawan
        return $this->belongsTo(Karyawan::class, 'karyawan_id'); // 'karyawan_id' adalah foreign key di tabel 'gajis'
    }
}
