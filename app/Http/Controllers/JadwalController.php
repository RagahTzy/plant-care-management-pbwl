<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query dasar
        $query = Jadwal::with('tanaman.user');

        // Jika yang login BUKAN admin, batasi hanya jadwal untuk tanamannya saja
        if (auth()->user()->role !== 'admin') {
            $query->whereHas('tanaman', function($q) {
                $q->where('user_id', auth()->id());
            });
        }

        // FITUR FILTER: Jika URL memiliki ?tanaman_id=... (ditekan dari halaman tanaman)
        if ($request->has('tanaman_id')) {
            $query->where('tanaman_id', $request->tanaman_id);
        }

        // Ambil data terbaru
        $jadwals = $query->latest()->get();

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        // Admin bisa memilih dari semua tanaman yang ada
        $tanamans = Tanaman::with('user')->get();
        return view('jadwal.create', compact('tanamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'aktivitas'  => 'required|string|max:255',
            'tanggal'    => 'required|date',
        ]);

        Jadwal::create([
            'tanaman_id' => $request->tanaman_id,
            'aktivitas'  => $request->aktivitas,
            'tanggal'    => $request->tanggal,
            'status'     => 'pending'
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $tanamans = Tanaman::all();
        return view('jadwal.edit', compact('jadwal', 'tanamans'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal diperbarui!');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal dihapus!');
    }

    public function markAsDone($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update(['status' => 'selesai']);
        return back()->with('success', 'Tugas selesai!');
    }
}