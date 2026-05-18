@extends('layouts.dashboard')

@section('title', 'Tambah Tanaman Baru - Admin')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('tanaman.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white hover:bg-botanical-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Tambah Tanaman</h2>
            <p class="text-sm text-gray-400 mt-1">Registrasi spesimen baru dan tetapkan ke pemiliknya.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-4 rounded-xl mb-6">
            <div class="flex items-center gap-2 font-bold mb-2">
                <span>⚠️</span> Gagal menyimpan data:
            </div>
            <ul class="list-disc list-inside text-sm space-y-1 ml-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tanaman.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-6">
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-4">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nama Tanaman <span class="text-red-400">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full bg-[#0B100D] border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 focus:outline-none transition" placeholder="Contoh: Monstera Deliciosa">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Spesies/Keluarga</label>
                            <input type="text" name="spesies" value="{{ old('spesies') }}" class="w-full bg-[#0B100D] border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 focus:outline-none transition" placeholder="Contoh: Araceae">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Lokasi Penempatan</label>
                            <select name="lokasi_id" class="w-full bg-[#0B100D] border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 focus:outline-none transition">
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi->id }}" {{ old('lokasi_id') == $lokasi->id ? 'selected' : '' }}>{{ $lokasi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Pemilik Tanaman (User) <span class="text-red-400">*</span></label>
                        <select name="user_id" required class="w-full bg-[#0B100D] border border-botanical-700 rounded-lg px-4 py-2.5 text-white focus:border-emerald-500 focus:outline-none transition">
                            <option value="">-- Pilih Pemilik Tanaman --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                    <label class="block text-sm font-medium text-gray-400 mb-4">Foto Spesimen</label>
                    <div class="mt-2 flex flex-col items-center rounded-xl border border-dashed border-botanical-700 px-6 py-8 hover:bg-botanical-700/20 transition relative">
                        
                        <div id="preview-container" class="hidden mb-4">
                            <img id="image-preview" src="" alt="Preview" class="w-32 h-32 object-cover rounded-xl border border-botanical-700 shadow-lg">
                        </div>

                        <div class="text-center" id="upload-icon">
                            <div class="text-4xl mb-4">📸</div>
                        </div>

                        <div class="mt-2 flex text-sm leading-6 text-gray-400 justify-center">
                            <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold text-emerald-500 hover:text-emerald-400">
                                <span id="file-name">Pilih Gambar</span>
                                <input id="file-upload" name="foto" type="file" class="sr-only" accept="image/*" onchange="previewFile(this)">
                            </label>
                        </div>
                        <p class="text-xs leading-5 text-gray-500 mt-2">PNG, JPG maksimal 5MB</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 border-t border-botanical-700 pt-6">
            <a href="{{ route('tanaman.index') }}" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-emerald-500 text-[#0B100D] hover:bg-emerald-400 shadow-[0_0_15px_rgba(16,185,129,0.3)] transition">
                Simpan Tanaman Baru
            </button>
        </div>
    </form>
</div>

<script>
    function previewFile(input) {
        const file = input.files[0];
        const fileName = document.getElementById('file-name');
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');
        const uploadIcon = document.getElementById('upload-icon');

        if (file) {
            // Ubah teks jadi nama file
            fileName.textContent = 'Ganti: ' + file.name;
            
            // Buat preview gambar
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                uploadIcon.classList.add('hidden'); // Sembunyikan ikon kamera agar rapi
            }
            reader.readAsDataURL(file);
        } else {
            fileName.textContent = 'Pilih Gambar';
            previewContainer.classList.add('hidden');
            uploadIcon.classList.remove('hidden');
            imagePreview.src = '';
        }
    }
</script>
@endsection