@extends('layouts.dashboard')

@section('title', 'Tambah Tips - Admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 pb-12">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('tips.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <h2 class="text-3xl text-white font-serif font-light">Tambah Tips Baru</h2>
    </div>

    <form action="{{ route('tips.store') }}" method="POST" class="bg-botanical-800 p-8 rounded-2xl border border-botanical-700/50 space-y-6">
        @csrf
        <div>
            <label class="block text-sm text-gray-400 mb-2">Target Tanaman</label>
            <select name="tanaman_id" class="...">
                <option value="">-- Pilih Tanaman --</option>
                @foreach($tanamans as $t)
                    <option value="{{ $t->id }}">{{ $t->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-2">Judul Tips</label>
            <input type="text" name="judul" class="w-full bg-botanical-900 border border-botanical-700 rounded-xl px-4 py-3 text-white focus:border-emerald-500 outline-none" required>
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-2">Deskripsi Panduan</label>
            <textarea name="deskripsi" rows="5" class="w-full bg-botanical-900 border border-botanical-700 rounded-xl px-4 py-3 text-white focus:border-emerald-500 outline-none" required></textarea>
        </div>

        <button type="submit" class="w-full bg-emerald-500 text-black font-bold py-4 rounded-xl hover:bg-emerald-400 transition shadow-[0_10px_20px_rgba(16,185,129,0.2)]">
            SIMPAN TIPS
        </button>
    </form>
</div>
@endsection