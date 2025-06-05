<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama',
        'pekerjaan',
        'email',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gajis()
    {
        // Karyawan punya banyak data Gaji
        return $this->hasMany(Gaji::class, 'karyawan_id'); // 'karyawan_id' adalah foreign key di tabel 'gajis'
    }
}
