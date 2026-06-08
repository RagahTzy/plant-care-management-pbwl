<?php

namespace App\Http\Controllers;

// UBAH: Gunakan model Tip (tanpa 's')
use App\Models\Tip; 
use App\Models\Tanaman;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function index(Request $request)
    {
        // UBAH: Tips:: menjadi Tip::
        $query = Tip::with('tanaman.user');

        // Jika user biasa, hanya tampilkan tips untuk tanaman miliknya
        if (auth()->user()->role !== 'admin') {
            $query->whereHas('tanaman', function($q) {
                $q->where('user_id', auth()->id());
            });
        }

        // Jika diakses dari tombol "Tips" di detail tanaman tertentu
        if ($request->has('tanaman_id')) {
            $query->where('tanaman_id', $request->tanaman_id);
        }

        $tips = $query->latest()->get();
        return view('tips.index', compact('tips'));
    }

    public function create() {
        $tanamans = Tanaman::all();
        return view('tips.create', compact('tanamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'judul'      => 'required|string|max:255',
            'deskripsi'  => 'required|string',
        ]);

        // UBAH: Tips:: menjadi Tip::
        Tip::create($request->all());

        return redirect()->route('tips.index')->with('success', 'Tips perawatan berhasil ditambahkan!');
    }

    // TAMBAHAN: Fungsi show untuk menampilkan detail tips saat tombol LIHAT ditekan
    public function show($id)
    {
        $tip = Tip::with('tanaman.user')->findOrFail($id);

        // Security check
        if (auth()->user()->role !== 'admin' && $tip->tanaman->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk melihat tips ini.');
        }

        return view('tips.show', compact('tip'));
    }

    public function edit($id)
    {
        // UBAH: Tips:: menjadi Tip:: dan jadikan variabel $tip (tunggal) agar cocok dengan view
        $tip = Tip::findOrFail($id);
        
        // Security check
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat mengedit tips.');
        }

        $tanamans = Tanaman::all();
        
        return view('tips.edit', compact('tip', 'tanamans'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'judul'      => 'required|string|max:255',
            'deskripsi'  => 'required|string',
        ]);

        $tip = Tip::findOrFail($id);
        $tip->update($request->all());

        return redirect()->route('tips.index')->with('success', 'Tips perawatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        // UBAH: Tips:: menjadi Tip::
        Tip::findOrFail($id)->delete();
        
        return redirect()->route('tips.index')->with('success', 'Tips berhasil dihapus!');
    }
}