@extends('layouts.dashboard')

@section('title', 'Edit Jadwal - Admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 pb-12">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('jadwal.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <h2 class="text-3xl text-white font-serif font-light">Edit Jadwal Perawatan</h2>
    </div>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="bg-botanical-800 p-8 rounded-2xl border border-botanical-700/50 space-y-6">
        @csrf @method('PUT')
        
        <div>
            <label class="block text-sm text-gray-400 mb-2">Pilih Tanaman</label>
            <select name="tanaman_id" class="w-full bg-botanical-900 border border-botanical-700 rounded-xl px-4 py-3 text-white focus:border-emerald-500 outline-none">
                <option value="">-- Tanaman Umum --</option>
                @foreach($tanamans as $t)
                    <option value="{{ $t->id }}" {{ $jadwal->tanaman_id == $t->id ? 'selected' : '' }}>{{ $t->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-gray-400 mb-2">Aktivitas</label>
                <input type="text" name="aktivitas" value="{{ $jadwal->aktivitas }}" class="w-full bg-botanical-900 border border-botanical-700 rounded-xl px-4 py-3 text-white focus:border-emerald-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-2">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal" value="{{ $jadwal->tanggal }}" class="w-full bg-botanical-900 border border-botanical-700 rounded-xl px-4 py-3 text-white focus:border-emerald-500 outline-none" required>
            </div>
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-2">Status Pekerjaan</label>
            <select name="status" class="w-full bg-botanical-900 border border-botanical-700 rounded-xl px-4 py-3 text-white focus:border-emerald-500 outline-none">
                <option value="pending" {{ $jadwal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="selesai" {{ $jadwal->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-emerald-500 text-black font-bold py-4 rounded-xl hover:bg-emerald-400 transition shadow-[0_10px_20px_rgba(16,185,129,0.2)]">
            PERBARUI JADWAL
        </button>
    </form>
</div>
@endsection