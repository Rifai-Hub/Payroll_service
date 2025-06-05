<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;


class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = Pengajuan::latest()->get();
        return view('pengajuan.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'tanggal_kirim' => 'required|date',
            'your_submission' => 'required|string',
        ]);

        $validated['status'] = 'Menunggu'; // Set default status to pending
         $validated['karyawan_id'] = auth()->user()->id; // ✅ TAMBAHKAN INI

        Pengajuan::create($validated);
        return redirect()->route('submissions.index')->with('success', 'Pengajuan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('pengajuan.edit', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'tanggal_kirim' => 'required|date', // typo diperbaiki
            'your_submission' => 'required|string',
        ]);

        $pengajuan->update($validated);
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('submissions.index')->with('success', 'Pengajuan berhasil dihapus');
    }

    public function updateStatus(Request $request, Pengajuan $pengajuan)
    {
        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        $pengajuan->update($validated);
        return redirect()->route('submissions.index')->with('success', 'Status pengajuan berhasil diperbarui');
    }
}