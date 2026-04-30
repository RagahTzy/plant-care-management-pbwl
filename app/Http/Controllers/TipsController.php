<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip;

class TipsController extends Controller
{
    // ✅ LIST TIPS
    public function index()
    {
        $tips = Tip::latest()->get();
        return view('tips.index', compact('tips'));
    }

    // ✅ DETAIL TIPS
    public function show($id)
    {
        $tip = Tip::findOrFail($id);
        return view('tips.show', compact('tip'));
    }

    // ✅ FORM TAMBAH
    public function create()
    {
        return view('tips.create');
    }

    // ✅ SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Tip::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('tips.index')->with('success', 'Tips berhasil ditambahkan');
    }

    // ✅ FORM EDIT
    public function edit($id)
    {
        $tip = Tip::findOrFail($id);
        return view('tips.edit', compact('tip'));
    }

    // ✅ UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $tip = Tip::findOrFail($id);
        $tip->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('tips.index')->with('success', 'Tips berhasil diupdate');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $tip = Tip::findOrFail($id);
        $tip->delete();

        return redirect()->route('tips.index')->with('success', 'Tips berhasil dihapus');
    }
}