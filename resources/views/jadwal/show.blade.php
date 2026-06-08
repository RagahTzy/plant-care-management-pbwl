@extends('layouts.dashboard')

@section('title', 'Detail Jadwal - Botanical Curator')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('jadwal.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Detail Jadwal</h2>
            <p class="text-sm text-gray-400 mt-1">Informasi kegiatan perawatan spesimen.</p>
        </div>
    </div>

    <div class="bg-botanical-800 rounded-2xl p-8 border border-botanical-700/50">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Aktivitas</p>
                <h3 class="text-2xl text-white font-medium">{{ $jadwal->aktivitas }}</h3>
            </div>
            <div class="text-right">
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $jadwal->status == 'selesai' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-orange-500/10 text-orange-400' }}">
                    {{ $jadwal->status }}
                </span>
            </div>
            
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Tanaman</p>
                <p class="text-white">{{ $jadwal->tanaman->nama ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Target Tanggal</p>
                <p class="text-white">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d F Y') }}</p>
            </div>
            
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Pemilik</p>
                <p class="text-white">{{ $jadwal->tanaman->user->name ?? 'N/A' }}</p>
            </div>
        </div>
        
        <div class="mt-10 pt-6 border-t border-botanical-700 flex gap-4">
            @if($jadwal->status !== 'selesai')
                <form action="{{ route('jadwal.selesai', $jadwal->id) }}" method="POST" class="flex-1">
                    @csrf @method('PATCH')
                    <button class="w-full bg-emerald-500 text-black py-3 rounded-xl font-bold hover:bg-emerald-400 transition">TANDAI SELESAI</button>
                </form>
            @endif
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="flex-1 bg-yellow-500 text-black text-center py-3 rounded-xl font-bold hover:bg-yellow-400 transition">EDIT JADWAL</a>
            @endif
        </div>
    </div>
</div>
@endsection
