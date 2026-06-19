@extends('layouts.dashboard')

@section('title', 'Koleksi Tanaman - Plant Care Management System')

@section('content')
<x-slot name="header">
    <x-navbar 
        section="KOLEKSI" 
        pageTitle="Daftar Tanaman" 
        :addRoute="auth()->user()->role === 'admin' ? 'admin.tanaman.create' : null" 
    />
</x-slot>

<div class="max-w-7xl mx-auto space-y-6 pb-12">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">
                {{ auth()->user()->role === 'admin' ? 'Manajemen Seluruh Tanaman' : 'Tanaman Saya' }}
            </h2>
            <p class="text-gray-400 text-sm mt-1">Total: {{ $tanaman->count() }} spesimen terdaftar.</p>
        </div>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.tanaman.create') }}" class="inline-flex items-center gap-2 bg-emerald-500 text-[#0B100D] px-4 py-3 rounded-2xl font-semibold uppercase tracking-wider hover:bg-emerald-400 transition">
                <span class="text-xl leading-none">+</span>
                <span>Tambah Tanaman</span>
            </a>
        @endif
    </div>

    <!-- Pesan Sukses (Jika ada) -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <x-table>
            <x-slot name="head">
                <th class="px-6 py-4">Spesimen Tanaman</th>
                <th class="px-6 py-4">Lokasi</th>
                @if(auth()->user()->role === 'admin')
                    <th class="px-6 py-4">Pemilik (User)</th>
                @endif
                <th class="px-6 py-4 text-right">Fitur & Aksi</th>
            </x-slot>

            @forelse($tanaman as $item)
                <tr class="hover:bg-botanical-700/30 transition border-b border-botanical-700/50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <!-- Menampilkan Foto Asli jika ada -->
                            <div class="w-10 h-10 rounded-lg bg-botanical-900 flex items-center justify-center text-xl shadow-inner border border-botanical-700 overflow-hidden">
                                @if($item->foto)
                                    <img src="{{ Storage::disk('supabase')->url($item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                                @else
                                    🪴
                                @endif
                            </div>
                            <div>
                                <p class="text-white font-medium">{{ $item->nama }}</p>
                                <p class="text-xs text-gray-500">{{ $item->spesies ?? 'Spesies belum diatur' }}</p>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 text-gray-400 text-sm">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs bg-botanical-900 border border-botanical-700 text-gray-300">
                            📍 {{ $item->lokasi->nama ?? 'Belum ditentukan' }}
                        </span>
                    </td>
                    
                    @if(auth()->user()->role === 'admin')
                        <td class="px-6 py-4 text-gray-400 text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-emerald-900 text-emerald-400 flex items-center justify-center text-[10px] font-bold">
                                    {{ substr($item->user->name ?? 'U', 0, 1) }}
                                </div>
                                <span>{{ $item->user->name ?? 'N/A' }}</span>
                            </div>
                        </td>
                    @endif

                    <td class="px-6 py-4 text-right space-x-1 whitespace-nowrap">
                        <!-- FITUR UMUM: DETAIL (Semua Role) -->
                        <a href="{{ route('tanaman.show', $item->id) }}" class="inline-flex text-[10px] uppercase tracking-tighter bg-emerald-500/10 text-emerald-400 px-2 py-1.5 rounded border border-emerald-500/20 hover:bg-emerald-500 hover:text-white transition">
                            Detail
                        </a>

                        <!-- FITUR JADWAL & TIPS -->
                        <a href="{{ route('jadwal.index', ['tanaman_id' => $item->id]) }}" class="inline-flex text-[10px] uppercase tracking-tighter bg-blue-500/10 text-blue-400 px-2 py-1.5 rounded border border-blue-500/20 hover:bg-blue-500 hover:text-white transition">
                            📅 Jadwal
                        </a>
                        <a href="{{ route('tips.index', ['tanaman_id' => $item->id]) }}" class="inline-flex text-[10px] uppercase tracking-tighter bg-purple-500/10 text-purple-400 px-2 py-1.5 rounded border border-purple-500/20 hover:bg-purple-500 hover:text-white transition">
                            💡 Tips
                        </a>

                        <!-- KHUSUS ADMIN: EDIT & HAPUS -->
                        @if(auth()->user()->role === 'admin')
                            <span class="text-gray-700 mx-1">|</span>
                            <a href="{{ route('admin.tanaman.edit', $item->id) }}" class="inline-flex text-[10px] uppercase tracking-tighter bg-yellow-500/10 text-yellow-500 px-2 py-1.5 rounded border border-yellow-500/20 hover:bg-yellow-500 hover:text-black transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.tanaman.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus tanaman ini permanen?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex text-[10px] uppercase tracking-tighter bg-red-500/10 text-red-400 px-2 py-1.5 rounded border border-red-500/20 hover:bg-red-500 hover:text-white transition">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <!-- TAMPILAN SAAT DATA KOSONG -->
                <tr>
                    <td colspan="{{ auth()->user()->role === 'admin' ? '4' : '3' }}" class="px-6 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <div class="text-7xl mb-6 opacity-50">🍂</div>
                            <h3 class="text-xl text-white font-medium">Belum Ada Koleksi Tanaman</h3>
                            <p class="text-gray-500 max-w-sm mx-auto mt-2 mb-8">
                                Sepertinya belum ada spesimen yang terdaftar di sistem kami saat ini.
                            </p>
                            
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.tanaman.create') }}" 
                                   class="inline-flex items-center gap-3 bg-emerald-500 text-[#0B100D] px-8 py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-emerald-400 transition-all shadow-[0_10px_30px_rgba(16,185,129,0.3)]">
                                    <span class="text-xl">+</span>
                                    <span>Tambah Tanaman Pertama</span>
                                </a>
                            @else
                                <p class="text-emerald-500/70 text-sm italic">
                                    Silakan hubungi Admin untuk mendaftarkan tanaman kamu.
                                </p>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </x-table>
    </div>
</div>
@endsection