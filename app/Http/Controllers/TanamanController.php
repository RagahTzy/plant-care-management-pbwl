<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TanamanController extends Controller
{
    // Ini adalah method yang hilang/error tadi
    public function index()
    {
        // Logic Fitur: 
        // Jika Admin: Lihat semua tanaman, termasuk user dan lokasi
        // Jika User: Hanya lihat tanaman miliknya
        if (auth()->user()->role === 'admin') {
            $tanaman = Tanaman::with(['user', 'lokasi'])->get();
        } else {
            $tanaman = Tanaman::with('lokasi')->where('user_id', auth()->id())->get();
        }

        return view('tanaman.index', compact('tanaman'));
    }

    public function show($id)
    {
        $tanaman = Tanaman::with('lokasi', 'user')->findOrFail($id);

        if (auth()->user()->role !== 'admin' && $tanaman->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak. Anda tidak memiliki tanaman ini.');
        }

        return view('tanaman.show', compact('tanaman'));
    }

    // Method untuk Admin (CRUD)
    public function create()
    {
        // Ambil semua user agar Admin bisa memilih pemilik tanaman
        $users = User::where('role', 'user')->get();
        $lokasis = Lokasi::all();
        return view('tanaman.create', compact('users', 'lokasis'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama'    => 'required|string|max:255',
            'spesies' => 'nullable|string|max:255',
            'lokasi_id' => 'nullable|exists:lokasis,id',
            'user_id' => 'required|exists:users,id',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $data = $request->all();

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            // Simpan foto di folder tanaman pada disk supabase
            $path = $request->file('foto')->store('tanaman', 'supabase');
            $data['foto'] = $path;
        }

        // Simpan ke database
        Tanaman::create($data);

        // Arahkan kembali ke halaman daftar tanaman dengan pesan sukses
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tanaman = Tanaman::findOrFail($id);
        
        // Ambil data user agar dropdown pemilik tanaman tidak error
        $users = User::where('role', 'user')->get();
        $lokasis = Lokasi::all();
        
        // Kirim $tanaman, $users, dan $lokasis ke view edit
        return view('tanaman.edit', compact('tanaman', 'users', 'lokasis'));
    }

    public function update(Request $request, $id)
    {
        $tanaman = Tanaman::findOrFail($id);

        // Validasi data baru
        $request->validate([
            'nama'    => 'required|string|max:255',
            'spesies' => 'nullable|string|max:255',
            'lokasi_id' => 'nullable|exists:lokasis,id',
            'user_id' => 'required|exists:users,id',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $data = $request->all();

        // Cek apakah Admin mengupload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage jika ada, agar storage tidak penuh
            if ($tanaman->foto && Storage::disk('supabase')->exists($tanaman->foto)) {
                Storage::disk('supabase')->delete($tanaman->foto);
            }
            
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('tanaman', 'supabase');
        }

        // Update data ke database
        $tanaman->update($data);

        // Arahkan kembali ke daftar tanaman dengan pesan sukses
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tanaman = Tanaman::findOrFail($id);
        
        // Hapus foto dari storage jika ada
        if ($tanaman->foto && Storage::disk('supabase')->exists($tanaman->foto)) {
            Storage::disk('supabase')->delete($tanaman->foto);
        }
        
        $tanaman->delete();
        
        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil dihapus secara permanen.');
    }
}