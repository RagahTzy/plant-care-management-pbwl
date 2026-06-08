@extends('layouts.dashboard')

@section('title', 'Jadwal Perawatan')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    
    <div class="flex justify-between items-end mb-4">
        <div>
            <h2 class="text-3xl text-white font-serif font-light">Jadwal Perawatan</h2>
            <p class="text-gray-400 text-sm">Kelola rutinitas pemeliharaan spesimen.</p>
        </div>
        
        <!-- TOMBOL TAMBAH KHUSUS ADMIN -->
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.jadwal.create') }}" class="bg-emerald-500 text-black px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-emerald-400 transition shadow-[0_10px_20px_rgba(16,185,129,0.2)]">
                + TAMBAH JADWAL
            </a>
        @endif
    </div>

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-botanical-900/50 text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                <tr>
                    <th class="px-6 py-4">Tanaman & Pemilik</th>
                    <th class="px-6 py-4">Aktivitas</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Opsi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-botanical-700/50">
                @forelse($jadwals as $j)
                <tr class="hover:bg-white/[0.02] transition">
                    
                    <!-- KOLOM TANAMAN (SUDAH DIPERBAIKI) -->
                    <td class="px-6 py-4">
                        <div class="text-white font-medium">{{ optional($j->tanaman)->nama ?? 'Tanaman Umum / Lama' }}</div>
                        <div class="text-[10px] text-emerald-500 uppercase font-bold">{{ optional(optional($j->tanaman)->user)->name ?? '-' }}</div>
                    </td>

                    <td class="px-6 py-4 text-gray-300 text-sm">{{ $j->aktivitas }}</td>
                    <td class="px-6 py-4 text-gray-400 text-sm">{{ \Carbon\Carbon::parse($j->tanggal)->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-[9px] font-bold uppercase {{ $j->status == 'selesai' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-orange-500/10 text-orange-400' }}">
                            {{ $j->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <!-- User & Admin bisa selesaikan tugas -->
                        @if($j->status !== 'selesai')
                            <form action="{{ route('jadwal.selesai', $j->id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="text-emerald-500 hover:text-white transition text-xs font-bold">DONE</button>
                            </form>
                        @endif

                        <!-- HANYA ADMIN YANG BISA EDIT/HAPUS -->
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="text-yellow-500 hover:text-white transition text-xs font-bold">EDIT</a>
                            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus jadwal?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:text-white transition text-xs font-bold">HAPUS</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">Belum ada jadwal.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection