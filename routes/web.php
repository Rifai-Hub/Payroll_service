<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Pengajuan Routes by Rifai
    Route::get('/pengajuan', [\App\Http\Controllers\PengajuanController::class, 'index'])->name('submissions.index');
    Route::get('/pengajuan/create', [\App\Http\Controllers\PengajuanController::class, 'create'])->name('submissions.create');
    Route::post('/pengajuan/store', [\App\Http\Controllers\PengajuanController::class, 'store'])->name('submissions.store');
    Route::get('/pengajuan/{pengajuan}/edit', [\App\Http\Controllers\PengajuanController::class, 'edit'])->name('submissions.edit');
    Route::put('/pengajuan/{pengajuan}', [\App\Http\Controllers\PengajuanController::class, 'update'])->name('submissions.update');
    Route::delete('/pengajuan/{pengajuan}', [\App\Http\Controllers\PengajuanController::class, 'destroy'])->name('submissions.destroy');
    Route::patch('/pengajuan/{pengajuan}', [\App\Http\Controllers\PengajuanController::class, 'updateStatus'])->name('submissions.updateStatus');

// Gaji Routes by Rifai
Route::get('/gaji', [\App\Http\Controllers\GajiController::class, 'index'])->name('gaji.index');
Route::get('/gaji/create', [\App\Http\Controllers\GajiController::class, 'create'])->name('gaji.create');
Route::post('/gaji/store', [\App\Http\Controllers\GajiController::class, 'store'])->name('gaji.store');
Route::get('/gaji/{id}/edit', [GajiController::class, 'edit'])->name('gaji.edit');

// Ini adalah baris yang perlu diperhatikan:
Route::patch('/gaji/{gaji}', [\App\Http\Controllers\GajiController::class, 'update'])->name('gaji.update');
// ATAU jika Anda memutuskan menggunakan PUT:
// Route::put('/gaji/{gaji}', [\App\Http\Controllers\GajiController::class, 'update'])->name('gaji.update');

Route::delete('/gaji/{gaji}', [\App\Http\Controllers\GajiController::class, 'destroy'])->name('gaji.destroy');
Route::put('/gaji/{gaji}/status', [\App\Http\Controllers\GajiController::class, 'updateStatus'])->name('gaji.updateStatus');

// AKTIFKAN KEMBALI BARIS INI:
Route::get('/gaji/{gaji}', [\App\Http\Controllers\GajiController::class, 'show'])->name('gaji.show'); // Gunakan {gaji} untuk Route Model Binding



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


   


Route::get('/admin', function () {
    return view('dasbhboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('/user', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('user');





require __DIR__.'/auth.php';
