<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\User; // Tambahkan ini jika ingin menampilkan nama user di laporan

class LaporanController extends Controller
{
    // ✅ LIST LAPORAN
    public function index()
    {
        // Logic Fitur:
        // Jika Admin: Lihat semua laporan
        // Jika User: Hanya lihat laporan miliknya
        if (Auth::user()->role === 'admin') {
            $laporans = Laporan::with(['user', 'tanaman'])->latest()->paginate(10);
        } else {
            $laporans = Laporan::with(['user', 'tanaman'])->where('user_id', Auth::id())->latest()->paginate(10);
        }
        return view('laporan.index', compact('laporans'));
    }

    // ✅ FORM TAMBAH
    public function create()
    {
        // Pastikan hanya user yang bisa membuat laporan
        if (Auth::user()->role !== 'user') {
            abort(403, 'Akses ditolak. Hanya pengguna yang dapat membuat laporan.');
        }
        
        // Ambil tanaman milik user untuk dipilih di form
        $tanamans = Auth::user()->tanamans;
        return view('laporan.create', compact('tanamans'));
    }

    // ✅ SIMPAN DATA
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'catatan'    => 'required|string',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        // Verifikasi bahwa tanaman tersebut benar milik user yang login
        $tanaman = \App\Models\Tanaman::where('id', $request->tanaman_id)
                                      ->where('user_id', Auth::id())
                                      ->firstOrFail();

        $data = $request->only(['tanaman_id', 'catatan']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('laporan', 'supabase');
        }

        Laporan::create($data);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    // ✅ DETAIL LAPORAN
    public function show($id)
    {
        $laporan = Laporan::with(['user', 'tanaman'])->findOrFail($id);

        // Batasi akses: Admin bisa melihat semua, User hanya bisa melihat laporannya sendiri
        if (Auth::user()->role !== 'admin' && $laporan->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak. Anda tidak memiliki laporan ini.');
        }
        return view('laporan.show', compact('laporan'));
    }

    // ✅ FORM EDIT
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);

        // Authorization: Admin can edit anything, User only their own
        if (Auth::user()->role !== 'admin' && $laporan->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        // Users can only pick from their own plants, Admin from the report's owner's plants
        if (Auth::user()->role === 'admin') {
            $tanamans = \App\Models\Tanaman::where('user_id', $laporan->user_id)->get();
        } else {
            $tanamans = Auth::user()->tanamans;
        }

        return view('laporan.edit', compact('laporan', 'tanamans'));
    }

    // ✅ UPDATE DATA
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $laporan->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'tanaman_id' => 'required|exists:tanamans,id',
            'catatan'    => 'required|string',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $data = $request->only(['tanaman_id', 'catatan']);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($laporan->foto && \Illuminate\Support\Facades\Storage::disk('supabase')->exists($laporan->foto)) {
                \Illuminate\Support\Facades\Storage::disk('supabase')->delete($laporan->foto);
            }
            $data['foto'] = $request->file('foto')->store('laporan', 'supabase');
        }

        $laporan->update($data);

        $route = Auth::user()->role === 'admin' ? 'laporan.index' : 'laporan.index';
        return redirect()->route($route)->with('success', 'Laporan berhasil diperbarui!');
    }

    // ✅ HAPUS DATA
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $laporan->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        // Delete photo from Supabase
        if ($laporan->foto && \Illuminate\Support\Facades\Storage::disk('supabase')->exists($laporan->foto)) {
            \Illuminate\Support\Facades\Storage::disk('supabase')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}