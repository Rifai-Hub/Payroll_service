<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $gaji = collect(); // Initialize an empty collection

        // Check if the authenticated user has the 'admin' role
        if ($user->hasRole('admin')) {
            // If admin, fetch all salary data
            $gaji = Gaji::latest()->get();
        } else {
            // If not admin (regular user)
            // Ensure the logged-in user is linked to a Karyawan record
            if ($user->karyawan) { // Call the 'karyawan()' relationship from the User model
                // Fetch salary data only for the Karyawan linked to this user
                // Call the 'gajis()' relationship from the Karyawan model
                $gaji = $user->karyawan->gajis()->latest()->get();
            }
            // If the user doesn't have a linked Karyawan, $gaji remains an empty collection.
        }

        return view('gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Only admin should be able to create new salaries
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        $karyawans = Karyawan::all();
        return view('gaji.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Only admin should be able to store new salaries
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $penggajian = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'nama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'gaji_bulananan' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
            'tanggal_kirim' => 'required|date',
        ]);

        // Calculate total_gaji
        $penggajian['total_gaji'] = $penggajian['gaji_bulananan'] + $penggajian['tunjangan'] - $penggajian['potongan'];

        $penggajian['status'] = 'Belum Dibayar'; // Set default status to pending
        Gaji::create($penggajian);
        return redirect()->route('gaji.index')->with('success', 'Penggajian sedang diproses');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji) // Using Route Model Binding
    {
        $user = Auth::user();
        
        if (!$user->hasRole('admin') && (!$user->karyawan || $user->karyawan->id !== $gaji->karyawan_id)) {
            abort(403, 'Unauthorized action.');
        }

        return view('gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        $user = Auth::user();

        
        if (!$user->hasRole('admin') && (!$user->karyawan || $user->karyawan->id !== $gaji->karyawan_id)) {
            abort(403, 'Unauthorized action.');
        }

        return view('gaji.edit', compact('gaji'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        $user = Auth::user();
        // Allow admin to update any salary, or allow the owner to update their own salary
        if (!$user->hasRole('admin') && (!$user->karyawan || $user->karyawan->id !== $gaji->karyawan_id)) {
            abort(403, 'Unauthorized action.');
        }

        $penggajian = $request->validate([
            'nama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'gaji_bulananan' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
            'tanggal_kirim' => 'required|date',
        ]);

        $gaji->update($penggajian);
        return redirect()->route('gaji.index')->with('success', 'Penggajian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        $gaji->delete();
        return redirect()->route('gaji.index')->with('success', 'Penggajian berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|string|in:Sudah Dibayar,Belum Dibayar',
        ]);

        $gaji = Gaji::findOrFail($id);
        $gaji->status = $request->status;
        $gaji->save(); // Use save() as you are just updating one attribute

        return redirect()->route('gaji.index')->with('success', 'Status penggajian berhasil diperbarui');
    }

    // Removed the public function karyawan() as it belongs in the Model, not the Controller.
}