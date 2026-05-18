@extends('layouts.dashboard')

@section('title', 'Tips Perawatan - Botanical Curator')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-12">
    <div class="flex justify-between items-end mb-4">
        <div>
            <h2 class="text-3xl text-white font-serif font-light">Tips & Panduan Perawatan</h2>
            <p class="text-gray-400 text-sm">Informasi spesifik untuk menjaga kesehatan setiap spesimen.</p>
        </div>
        
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('tips.create') }}" class="bg-emerald-500 text-black px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-emerald-400 transition shadow-[0_10px_20px_rgba(16,185,129,0.2)]">
                + TAMBAH TIPS
            </a>
        @endif
    </div>

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-botanical-900/50 text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                <tr>
                    <th class="px-6 py-4">Spesimen Tanaman</th>
                    <th class="px-6 py-4">Judul Tips</th>
                    <th class="px-6 py-4 w-1/3">Deskripsi</th>
                    <th class="px-6 py-4 text-right">Opsi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-botanical-700/50">
                @forelse($tips as $t)
                <tr class="hover:bg-white/[0.02] transition">
                    <td class="px-6 py-4">
                        <div class="text-white font-medium">{{ optional($t->tanaman)->nama ?? 'Umum' }}</div>
                        <div class="text-[10px] text-emerald-500 uppercase font-bold">{{ optional(optional($t->tanaman)->user)->name ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4 text-gray-200 font-medium">{{ $t->judul }}</td>
                    <td class="px-6 py-4 text-gray-400 text-xs leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($t->deskripsi, 80) }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('tips.show', $t->id) }}" class="text-emerald-500 hover:text-white transition text-xs font-bold">LIHAT</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('tips.edit', $t->id) }}" class="text-yellow-500 hover:text-white transition text-xs font-bold">EDIT</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-10 text-center text-gray-500 italic">Belum ada tips.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection