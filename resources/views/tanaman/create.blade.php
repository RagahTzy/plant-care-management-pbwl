@extends('layouts.dashboard')

@section('title', 'Tambah Tanaman Baru - Admin')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white hover:bg-botanical-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Tambah Tanaman</h2>
            <p class="text-sm text-gray-400 mt-1">Registrasi spesimen baru dan assign ke user.</p>
        </div>
    </div>

    <form action="#" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-2 space-y-6">
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
                    <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Informasi Botani</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300">Nama Populer / Julukan</label>
                            <input type="text" placeholder="ex: Fiddle Leaf Fig" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300">Spesies (Nama Ilmiah)</label>
                            <input type="text" placeholder="ex: Ficus Lyrata" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Kategori Koleksi</label>
                        <select class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 appearance-none transition">
                            <option value="" disabled selected>Pilih kategori...</option>
                            <option value="indoor">Indoor Garden</option>
                            <option value="succulent">Succulents & Cactus</option>
                            <option value="tropical">Tropicals</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Catatan Khusus (Opsional)</label>
                        <textarea rows="4" placeholder="Tambahkan catatan khusus mengenai kondisi awal tanaman..." class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition resize-none"></textarea>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                
                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-4">
                    <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Kepemilikan</h3>
                    
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Assign to User</label>
                        <select class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 appearance-none transition">
                            <option value="" disabled selected>Pilih Pemilik...</option>
                            <option value="1">Julian Sterling</option>
                            <option value="2">Dr. E. Thorne</option>
                            <option value="3">Arthur Chen</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">User ini akan bertanggung jawab atas jadwal perawatannya.</p>
                    </div>
                </div>

                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-4">
                    <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Target Optimal</h3>
                    
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300 flex items-center justify-between">
                                <span>Moisture Level (%)</span>
                                <span class="text-botanical-accent text-xs">65%</span>
                            </label>
                            <input type="range" min="0" max="100" value="65" class="w-full h-1 bg-botanical-900 rounded-lg appearance-none cursor-pointer accent-botanical-accent">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300">Kebutuhan Cahaya</label>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="cursor-pointer">
                                    <input type="radio" name="light" class="peer sr-only" value="low">
                                    <div class="text-center text-xs py-2 rounded-lg bg-botanical-900 border border-botanical-700 text-gray-400 peer-checked:bg-botanical-accent/20 peer-checked:border-botanical-accent peer-checked:text-botanical-accent transition">Low</div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="light" class="peer sr-only" value="med" checked>
                                    <div class="text-center text-xs py-2 rounded-lg bg-botanical-900 border border-botanical-700 text-gray-400 peer-checked:bg-botanical-accent/20 peer-checked:border-botanical-accent peer-checked:text-botanical-accent transition">Med</div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="light" class="peer sr-only" value="high">
                                    <div class="text-center text-xs py-2 rounded-lg bg-botanical-900 border border-botanical-700 text-gray-400 peer-checked:bg-botanical-accent/20 peer-checked:border-botanical-accent peer-checked:text-botanical-accent transition">High</div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-4">
                    <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Foto Awal</h3>
                    
                    <div class="mt-2 flex justify-center rounded-xl border border-dashed border-botanical-700 bg-botanical-900/50 px-6 py-8 hover:bg-botanical-900 transition cursor-pointer group">
                        <div class="text-center">
                            <svg class="mx-auto h-10 w-10 text-gray-500 group-hover:text-botanical-accent transition" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-400 justify-center">
                                <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold text-botanical-accent focus-within:outline-none hover:text-emerald-400">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-500">PNG, JPG, GIF up to 5MB</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex items-center justify-end gap-4 border-t border-botanical-700 pt-6">
            <button type="button" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                Batal
            </button>
            <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.3)] transition">
                Simpan Tanaman
            </button>
        </div>
    </form>
</div>
@endsection