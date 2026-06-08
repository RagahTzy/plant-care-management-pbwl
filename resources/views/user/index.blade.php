@extends('layouts.dashboard')

@section('title', 'Manajemen User - Admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Manajemen User</h2>
            <p class="text-sm text-gray-400 mt-2">Kelola akses, role, dan data pengguna sistem.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="bg-botanical-accent/20 hover:bg-botanical-accent/30 text-botanical-accent border border-botanical-accent/50 px-4 py-2.5 rounded-lg text-sm font-medium transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah User Baru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs text-gray-400 uppercase tracking-wider border-b border-botanical-700 bg-botanical-900/30">
                        <th class="px-6 py-5 font-medium">Pengguna</th>
                        <th class="px-6 py-5 font-medium">Role</th>
                        <th class="px-6 py-5 font-medium">No. Telepon</th>
                        <th class="px-6 py-5 font-medium">Tanggal Bergabung</th>
                        <th class="px-6 py-5 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-botanical-700">
                    @forelse($users as $user)
                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($user->avatar)
                                    <img src="{{ Storage::disk('supabase')->url($user->avatar) }}" alt="Avatar" class="w-10 h-10 rounded-full border border-botanical-700 object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full border border-botanical-700 bg-botanical-900 flex items-center justify-center text-emerald-500 font-bold text-xs">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="text-white font-medium">{{ $user->name }} @if($user->id === auth()->id()) <span class="text-[10px] bg-gray-700 px-1.5 py-0.5 rounded ml-1">SAYA</span> @endif</p>
                                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-medium px-2.5 py-1 rounded border {{ $user->role === 'admin' ? 'bg-botanical-accent/10 text-botanical-accent border-botanical-accent/20' : 'bg-blue-500/10 text-blue-400 border-blue-500/20' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-400">{{ $user->phone ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-gray-400 hover:text-white transition p-1.5 bg-botanical-900 rounded-lg border border-botanical-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.123 3.877a2.121 2.121 0 013 3L12 15l-4 1 1-4 8.123-8.127z"></path></svg>
                                </a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini? Semua data terkait mungkin akan terpengaruh.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 transition p-1.5 bg-red-500/10 rounded-lg border border-red-500/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">Belum ada pengguna terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="p-4 border-t border-botanical-700">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
