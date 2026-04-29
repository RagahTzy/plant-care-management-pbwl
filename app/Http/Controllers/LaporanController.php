<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    // ✅ LIST LAPORAN
    public function index()
    {
        $laporans = Laporan::latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    // ✅ FORM TAMBAH
    public function create()
    {
        return view('laporan.create');
    }

    // ✅ SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'catatan' => 'required',
        ]);

        Laporan::create([
            'catatan' => $request->catatan,
            'foto' => null, // nanti bisa dikembangin upload
        ]);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil ditambahkan');
    }

    // ✅ DETAIL LAPORAN
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }
}