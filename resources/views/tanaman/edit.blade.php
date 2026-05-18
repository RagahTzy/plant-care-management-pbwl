@extends('layouts.dashboard')

@section('title', 'Edit Tanaman - Admin')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 pb-12">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('tanaman.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Edit Data Tanaman</h2>
            <p class="text-sm text-gray-400 mt-1">Perbarui informasi spesimen dan kepemilikan.</p>
        </div>
    </div>

    <form action="{{ route('admin.tanaman.update', $tanaman->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-6">
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-400 mb-2">Nama Tanaman</label>
                            <input type="text" name="nama" value="{{ old('nama', $tanaman->nama) }}" class="w-full bg-botanical-900 border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Spesies / Varietas</label>
                            <input type="text" name="spesies" value="{{ old('spesies', $tanaman->spesies) }}" class="w-full bg-botanical-900 border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Lokasi Penempatan</label>
                            <select name="lokasi_id" class="w-full bg-botanical-900 border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 outline-none transition">
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi->id }}" {{ old('lokasi_id', $tanaman->lokasi_id) == $lokasi->id ? 'selected' : '' }}>{{ $lokasi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                    <label class="block text-sm font-medium text-gray-400 mb-4">Tetapkan Pemilik (User)</label>
                    <select name="user_id" class="w-full bg-botanical-900 border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 outline-none transition">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $tanaman->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 h-full">
                    <label class="block text-sm font-medium text-gray-400 mb-4">Foto Spesimen</label>
                    <div class="relative group aspect-square rounded-xl bg-botanical-900 border-2 border-dashed border-botanical-700 flex flex-col items-center justify-center overflow-hidden">
                        @if($tanaman->foto)
                            <img id="image-preview" src="{{ asset('storage/' . $tanaman->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div id="upload-icon" class="text-4xl mb-2">📸</div>
                        @endif
                        
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <label class="cursor-pointer bg-emerald-500 text-black px-4 py-2 rounded-lg font-bold text-xs">
                                GANTI FOTO
                                <input type="file" name="foto" class="hidden" onchange="previewFile(this)">
                            </label>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-500 mt-4 leading-relaxed text-center">Format: JPG, PNG. Max: 2MB.<br>Biarkan kosong jika tidak ingin mengubah foto.</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 border-t border-botanical-700 pt-6">
            <a href="{{ route('tanaman.index') }}" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-emerald-500 text-[#0B100D] hover:bg-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.3)] transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function previewFile(input) {
        const file = input.files[0];
        const preview = document.getElementById('image-preview');
        const icon = document.getElementById('upload-icon');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if(preview) {
                    preview.src = e.target.result;
                } else {
                    // Jika sebelumnya tidak ada foto, buat elemen img baru
                    location.reload(); // Paling aman reload untuk refresh preview logic
                }
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection