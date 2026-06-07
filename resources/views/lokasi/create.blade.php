@extends('layouts.dashboard')

@section('title', 'Tambah Lokasi - Admin')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 pb-12">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.lokasi.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Tambah Lokasi</h2>
            <p class="text-sm text-gray-400 mt-1">Buat area penempatan baru dalam sistem.</p>
        </div>
    </div>

    <form action="{{ route('admin.lokasi.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="bg-botanical-800 rounded-2xl p-8 border border-botanical-700/50 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Nama Lokasi <span class="text-red-400">*</span></label>
                <input type="text" name="nama" value="{{ old('nama') }}" required 
                    class="w-full bg-[#0B100D] border border-botanical-700 rounded-lg px-4 py-3 text-white focus:border-emerald-500 focus:outline-none transition" 
                    placeholder="Contoh: Greenhouse A, Lantai 2, atau Taman Depan">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" rows="3" 
                    class="w-full bg-[#0B100D] border border-botanical-700 rounded-lg px-4 py-3 text-white focus:border-emerald-500 focus:outline-none transition" 
                    placeholder="Keterangan tambahan mengenai lokasi ini...">{{ old('deskripsi') }}</textarea>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 border-t border-botanical-700 pt-6">
            <a href="{{ route('admin.lokasi.index') }}" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                Batal
            </a>
            <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold bg-emerald-500 text-[#0B100D] uppercase tracking-widest hover:bg-emerald-400 shadow-[0_0_20px_rgba(16,185,129,0.3)] transition">
                Simpan Lokasi
            </button>
        </div>
    </form>
</div>
@endsection