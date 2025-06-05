<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = [
        'karyawan_id', 
        'nama',
        'pekerjaan',
        'tanggal_kirim',
        'status',
        'your_submission',
    ];
}
