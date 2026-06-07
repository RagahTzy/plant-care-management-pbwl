<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tanaman;
use App\Models\Jadwal;
use App\Models\Tip;
use App\Models\Laporan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        return view('user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'in:admin,user'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Akun pengguna berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'in:admin,user'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Akun pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        // Cegah admin menghapus dirinya sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        // Hapus avatar dari Supabase jika ada
        if ($user->avatar && \Illuminate\Support\Facades\Storage::disk('supabase')->exists($user->avatar)) {
            \Illuminate\Support\Facades\Storage::disk('supabase')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Akun pengguna berhasil dihapus!');
    }

    public function adminDashboard()
    {
        $stats = [
            'total_tanaman' => Tanaman::count(),
            'jadwal_hari_ini' => Jadwal::whereDate('tanggal', today())->count(),
            'total_tips' => Tip::count(),
            'laporan_baru' => Laporan::whereDate('created_at', today())->count(),
        ];

        $laporanTerbaru = Laporan::with(['user', 'tanaman'])->latest()->take(5)->get();

        return view('dashboard.admin', compact('stats', 'laporanTerbaru'));
    }

    public function userDashboard()
    {
        $user = auth()->user();
        
        $stats = [
            'tanaman_aktif' => $user->tanamans()->count(),
            'tugas_hari_ini' => Jadwal::whereHas('tanaman', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->whereDate('tanggal', today())->where('status', '!=', 'selesai')->count(),
            'laporan_saya' => $user->laporans()->count(),
        ];

        $pantauanTerbaru = $user->tanamans()->with('lokasi')->latest()->take(5)->get();

        return view('dashboard.user', compact('stats', 'pantauanTerbaru'));
    }
}
