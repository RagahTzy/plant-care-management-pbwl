@extends('layouts.dashboard')

@section('title', 'Edit Laporan Perawatan - Plant Care Management System')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('laporan.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white hover:bg-botanical-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Edit Laporan</h2>
            <p class="text-sm text-gray-400 mt-1">Perbarui catatan atau foto perkembangan tanaman.</p>
        </div>
    </div>

    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Tanaman yang Dirawat <span class="text-red-400">*</span></label>
                        <select name="tanaman_id" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 appearance-none transition" required>
                            @foreach($tanamans as $tanaman)
                                <option value="{{ $tanaman->id }}" {{ $laporan->tanaman_id == $tanaman->id ? 'selected' : '' }}>
                                    {{ $tanaman->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Catatan Kondisi & Perawatan <span class="text-red-400">*</span></label>
                        <textarea name="catatan" rows="6" placeholder="Ceritakan apa yang sudah dilakukan hari ini..." class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition resize-none" required>{{ old('catatan', $laporan->catatan) }}</textarea>
                    </div>
                </div>

                <div class="space-y-2 h-full flex flex-col">
                    <label class="text-sm font-medium text-gray-300">Bukti Foto (Opsional)</label>
                    <div id="preview-container" class="flex-1 mt-2 flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-botanical-700 bg-botanical-900/50 p-6 hover:bg-botanical-900 hover:border-botanical-accent/50 transition cursor-pointer group min-h-[250px] relative overflow-hidden">
                        <input id="foto-laporan" name="foto" type="file" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(this)">
                        
                        <!-- Placeholder (Visible when no new image selected) -->
                        <div id="placeholder" class="text-center flex flex-col items-center z-10 {{ $laporan->foto ? 'hidden' : '' }}">
                            <div class="w-16 h-16 rounded-full bg-botanical-800 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="h-8 w-8 text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h4 class="text-white font-medium mb-1">Ganti Foto</h4>
                            <p class="text-xs text-gray-500 max-w-[200px] text-center">Klik atau seret untuk mengganti foto lama.</p>
                        </div>

                        <!-- Preview Image (Shows current photo by default) -->
                        <img id="preview-image" src="{{ $laporan->foto ? Storage::disk('supabase')->url($laporan->foto) : '#' }}" alt="Preview" class="absolute inset-0 w-full h-full object-cover {{ $laporan->foto ? '' : 'hidden' }} z-10">
                        
                        <!-- Overlay on Hover -->
                        <div id="change-overlay" class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-15">
                            <span class="text-white text-sm font-medium">Klik untuk mengganti foto</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex items-center justify-end gap-4 border-t border-botanical-700 pt-6">
            <a href="{{ route('laporan.index') }}" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.3)] transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview-image');
    const placeholder = document.getElementById('placeholder');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
