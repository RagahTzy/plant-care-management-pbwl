@extends('layouts.dashboard')

@section('title', 'Kirim Laporan Perawatan - User')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white hover:bg-botanical-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Kirim Laporan</h2>
            <p class="text-sm text-gray-400 mt-1">Catat perkembangan tanaman dan lampirkan foto terbaru.</p>
        </div>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Tanaman yang Dirawat <span class="text-red-400">*</span></label>
                        <select class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 appearance-none transition" required>
                            <option value="" disabled selected>Pilih tanaman Anda...</option>
                            <option value="1">Monstera Deliciosa (#MN-092-A)</option>
                            <option value="2">Calathea Orbifolia (#CL-214-B)</option>
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-medium text-gray-300">Kondisi Tanaman Saat Ini <span class="text-red-400">*</span></label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-botanical-700 bg-botanical-900 cursor-pointer hover:border-botanical-accent/50 transition">
                                <input type="radio" name="kondisi" value="sehat" class="w-4 h-4 text-botanical-accent bg-botanical-900 border-botanical-700 focus:ring-botanical-accent" required>
                                <span class="text-sm text-gray-300">Sehat & Pertumbuhan Normal</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-botanical-700 bg-botanical-900 cursor-pointer hover:border-yellow-500/50 transition">
                                <input type="radio" name="kondisi" value="perhatian" class="w-4 h-4 text-yellow-500 bg-botanical-900 border-botanical-700 focus:ring-yellow-500">
                                <span class="text-sm text-gray-300">Perlu Perhatian (Layu, Kuning, dll)</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg border border-botanical-700 bg-botanical-900 cursor-pointer hover:border-red-500/50 transition">
                                <input type="radio" name="kondisi" value="sakit" class="w-4 h-4 text-red-500 bg-botanical-900 border-botanical-700 focus:ring-red-500">
                                <span class="text-sm text-gray-300">Terserang Hama / Sakit</span>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Catatan Perawatan</label>
                        <textarea rows="4" placeholder="Ceritakan apa yang sudah dilakukan hari ini, tinggi tanaman bertambah, daun baru, atau gejala aneh..." class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition resize-none"></textarea>
                    </div>
                </div>

                <div class="space-y-2 h-full flex flex-col">
                    <label class="text-sm font-medium text-gray-300">Bukti Foto <span class="text-red-400">*</span></label>
                    <div class="flex-1 mt-2 flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-botanical-700 bg-botanical-900/50 p-6 hover:bg-botanical-900 hover:border-botanical-accent/50 transition cursor-pointer group min-h-[250px] relative">
                        <input id="foto-laporan" name="foto" type="file" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required>
                        
                        <div class="text-center flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-botanical-800 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="h-8 w-8 text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h4 class="text-white font-medium mb-1">Ambil atau Unggah Foto</h4>
                            <p class="text-xs text-gray-500 max-w-[200px] text-center">Gunakan kamera HP atau pilih dari galeri. (Max. 5MB)</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex items-center justify-end gap-4 border-t border-botanical-700 pt-6">
            <button type="button" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                Batal
            </button>
            <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.3)] transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection