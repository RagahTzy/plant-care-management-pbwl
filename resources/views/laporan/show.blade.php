@extends('layouts.dashboard')

@section('title', 'Detail Laporan - Plant Care Management')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('laporan.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white hover:bg-botanical-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Detail Laporan</h2>
            <p class="text-sm text-gray-400 mt-1">Informasi lengkap laporan perawatan tanaman.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Info Box -->
        <div class="md:col-span-2 space-y-6">
            
            <!-- Informasi Laporan -->
            <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                <h3 class="text-lg font-semibold text-white mb-6">Informasi Laporan</h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-widest">ID Laporan</p>
                            <p class="text-lg text-emerald-500 font-mono font-bold mt-1">#REP-{{ str_pad($laporan->id, 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 font-medium">
                            Recorded
                        </span>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Tanaman</p>
                        <p class="text-white mt-1">{{ $laporan->tanaman->nama ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Pelapor</p>
                        <p class="text-white mt-1">{{ $laporan->user->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Tanggal Laporan</p>
                        <p class="text-white mt-1">{{ $laporan->created_at->format('d F Y H:i') ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Catatan Kondisi -->
            <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                <h3 class="text-lg font-semibold text-white mb-4">Catatan Kondisi</h3>
                <div class="bg-botanical-900 rounded-lg p-4 border border-botanical-700 text-gray-300 leading-relaxed">
                    {{ $laporan->catatan ?? 'Tidak ada catatan tersedia.' }}
                </div>
            </div>

        </div>

        <!-- Sidebar Info -->
        <div class="space-y-6">
            
            <!-- Foto -->
            @if($laporan->foto)
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                    <h3 class="text-lg font-semibold text-white mb-4">Foto Dokumentasi</h3>
                    <img src="{{ Storage::disk('supabase')->url($laporan->foto) }}" alt="Plant photo" class="w-full rounded-lg border border-botanical-700">
                </div>
            @endif

            <!-- Status Timeline -->
            <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                <h3 class="text-lg font-semibold text-white mb-4">Status</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <span class="text-sm text-gray-300">Recorded</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Dibuat pada {{ $laporan->created_at->diffForHumans() }}</p>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection