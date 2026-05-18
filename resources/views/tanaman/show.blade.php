@extends('layouts.dashboard')

@section('title', 'Detail Tanaman - Botanical Curator')

@section('content')
<x-slot name="header">
    <x-navbar 
        section="DETAIL SPESIMEN" 
        :pageTitle="$tanaman->nama" 
    />
</x-slot>

<div class="max-w-5xl mx-auto space-y-8 pb-12">
    
    <div class="flex items-center gap-6">
        <div class="w-24 h-24 rounded-2xl bg-botanical-800 border border-botanical-700 flex items-center justify-center text-5xl shadow-lg">
            {{ $tanaman->foto ? '📸' : '🪴' }}
        </div>
        <div>
            <h1 class="text-4xl text-white font-serif font-light">{{ $tanaman->nama }}</h1>
            <p class="text-botanical-accent tracking-widest uppercase text-xs font-bold mt-2">
                {{ $tanaman->spesies ?? 'Spesies belum diatur' }}
            </p>
            <div class="mt-3 flex gap-3">
                <span class="bg-botanical-800 border border-botanical-700 text-gray-300 px-3 py-1 rounded-full text-xs">
                    📍 {{ $tanaman->lokasi->nama ?? 'Lokasi belum diatur' }}
                </span>
                @if(auth()->user()->role === 'admin')
                    <span class="bg-botanical-800 border border-botanical-700 text-gray-300 px-3 py-1 rounded-full text-xs">
                        👤 Milik: {{ $tanaman->user->name ?? 'N/A' }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4 mt-8">
        @if(auth()->user()->role === 'user')
            <a href="{{ route('user.laporan.create', ['tanaman_id' => $tanaman->id]) }}" 
               class="flex-1 bg-emerald-500 text-[#0B100D] text-center py-4 rounded-xl font-bold uppercase tracking-widest hover:bg-emerald-400 transition-all shadow-[0_10px_20px_rgba(16,185,129,0.2)]">
                📸 Kirim Laporan Pertumbuhan
            </a>
        @endif
        
        <a href="{{ route('jadwal.index', ['tanaman_id' => $tanaman->id]) }}" 
           class="flex-1 bg-botanical-800 text-white text-center py-4 rounded-xl font-bold uppercase tracking-widest border border-botanical-700 hover:bg-botanical-700 transition-all">
            📅 Lihat Jadwal Perawatan
        </a>
        <a href="{{ route('tips.index', ['tanaman_id' => $tanaman->id]) }}" 
           class="flex-1 bg-botanical-800 text-white text-center py-4 rounded-xl font-bold uppercase tracking-widest border border-botanical-700 hover:bg-botanical-700 transition-all">
            💡 Lihat Tips Perawatan
        </a>
    </div>

    <div class="bg-botanical-800 rounded-2xl p-8 border border-botanical-700/50">
        <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-6">Informasi Sistem</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Tanggal Spesimen Terdaftar</p>
                <p class="text-white">{{ $tanaman->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Terakhir Diperbarui</p>
                <p class="text-white">{{ $tanaman->updated_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>
    
</div>
@endsection