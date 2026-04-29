<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    // ✅ LIST JADWAL + FILTER TANGGAL
    public function index(Request $request)
    {
        $query = Jadwal::query();

        // filter tanggal (opsional dari UI nanti)
        if ($request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $jadwals = $query->latest()->get();

        return view('jadwal.index', compact('jadwals'));
    }

    // ✅ FORM TAMBAH
    public function create()
    {
        return view('jadwal.create');
    }

    // ✅ SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'aktivitas' => 'required|string|max:255',
        ]);

        Jadwal::create([
            'tanggal' => $request->tanggal,
            'aktivitas' => $request->aktivitas,
            'status' => 'belum',
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    // ✅ FORM EDIT
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'aktivitas' => 'required|string|max:255',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
            'tanggal' => $request->tanggal,
            'aktivitas' => $request->aktivitas,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
    }

    // ✅ TANDAI SELESAI (INI PENTING BANGET 🔥)
    public function selesai($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'status' => 'selesai'
        ]);

        return redirect()->back()->with('success', 'Jadwal selesai');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}