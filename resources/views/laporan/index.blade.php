@extends('layouts.dashboard')

@section('title', 'Manajemen Laporan - Admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Laporan Perawatan</h2>
            <p class="text-sm text-gray-400 mt-2">Monitor perkembangan tanaman dan hasil laporan dari user.</p>
        </div>
        <button class="bg-botanical-800 hover:bg-botanical-700 text-gray-300 border border-botanical-700 px-4 py-2.5 rounded-lg text-sm font-medium transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Export PDF
        </button>
    </div>

    <div class="flex flex-wrap gap-4 mb-6">
        <div class="relative flex-1 min-w-[250px] max-w-md">
            <input type="text" placeholder="Cari nama tanaman atau pelapor..." class="w-full bg-botanical-800 text-sm text-gray-300 rounded-lg pl-10 pr-4 py-2.5 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700">
            <svg class="w-4 h-4 absolute left-3.5 top-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="bg-botanical-800 text-sm text-gray-300 rounded-lg px-4 py-2.5 focus:outline-none border border-botanical-700 appearance-none min-w-[150px]">
            <option>Semua Status</option>
            <option>Healthy</option>
            <option>Needs Attention</option>
        </select>
        <input type="date" class="bg-botanical-800 text-sm text-gray-300 rounded-lg px-4 py-2.5 focus:outline-none border border-botanical-700 appearance-none cursor-pointer">
    </div>

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs text-gray-400 uppercase tracking-wider border-b border-botanical-700 bg-botanical-900/30">
                        <th class="px-6 py-5 font-medium">Foto</th>
                        <th class="px-6 py-5 font-medium">Tanaman</th>
                        <th class="px-6 py-5 font-medium">Pelapor</th>
                        <th class="px-6 py-5 font-medium">Catatan Kondisi</th>
                        <th class="px-6 py-5 font-medium">Status</th>
                        <th class="px-6 py-5 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-botanical-700">
                    
                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="w-14 h-14 rounded-lg overflow-hidden border border-botanical-700 bg-botanical-900">
                                <img src="https://images.unsplash.com/photo-1614594975525-e45190c55d40?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Plant photo" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-white font-medium">Monstera Deliciosa</p>
                            <p class="text-xs text-gray-500 mt-1">Dilaporkan: Hari ini, 09:30</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pravatar.cc/150?img=33" alt="Avatar" class="w-6 h-6 rounded-full border border-botanical-700">
                                <span class="text-gray-300">Julian S.</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-400 max-w-xs truncate" title="Penyiraman dilakukan sesuai jadwal. Muncul 1 tunas daun baru, warna hijau cerah.">
                                "Penyiraman dilakukan sesuai jadwal. Muncul 1 tunas daun..."
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Healthy
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="inline-flex items-center text-xs font-medium text-botanical-accent hover:text-emerald-300 transition px-3 py-1.5 rounded-lg border border-botanical-accent/20 bg-botanical-accent/10 hover:bg-botanical-accent/20">
                                Detail
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="w-14 h-14 rounded-lg overflow-hidden border border-botanical-700 bg-botanical-900 flex items-center justify-center text-gray-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-white font-medium">Calathea Orbifolia</p>
                            <p class="text-xs text-gray-500 mt-1">Dilaporkan: Kemarin, 14:15</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pravatar.cc/150?img=11" alt="Avatar" class="w-6 h-6 rounded-full border border-botanical-700">
                                <span class="text-gray-300">Dr. Thorne</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-400 max-w-xs truncate" title="Ujung daun mulai menguning dan kering. Kelembaban udara sepertinya kurang.">
                                "Ujung daun mulai menguning dan kering. Kelembaban..."
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs bg-red-500/10 text-red-400 border border-red-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 shadow-[0_0_5px_#ef4444]"></span> Issue
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="inline-flex items-center text-xs font-medium text-botanical-accent hover:text-emerald-300 transition px-3 py-1.5 rounded-lg border border-botanical-accent/20 bg-botanical-accent/10 hover:bg-botanical-accent/20">
                                Detail
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="w-14 h-14 rounded-lg overflow-hidden border border-botanical-700 bg-botanical-900">
                                <img src="https://images.unsplash.com/photo-1597055974418-19614457db2a?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Plant photo" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-white font-medium">Ficus Lyrata</p>
                            <p class="text-xs text-gray-500 mt-1">Dilaporkan: 24 Okt 2023</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full border border-botanical-700 bg-botanical-900 flex items-center justify-center text-gray-400 font-medium text-[10px]">AC</div>
                                <span class="text-gray-300">Arthur C.</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-400 max-w-xs truncate" title="Pemupukan bulan ini sudah dilakukan. Tanaman tampak stabil.">
                                "Pemupukan bulan ini sudah dilakukan. Tanaman tampak..."
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Healthy
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="inline-flex items-center text-xs font-medium text-botanical-accent hover:text-emerald-300 transition px-3 py-1.5 rounded-lg border border-botanical-accent/20 bg-botanical-accent/10 hover:bg-botanical-accent/20">
                                Detail
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-botanical-700 flex items-center justify-between text-sm text-gray-400">
            <div>
                Menampilkan 1-3 dari 128 laporan
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">&lsaquo;</button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-botanical-700 text-botanical-accent">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">3</button>
                <span class="px-2">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">&rsaquo;</button>
            </div>
        </div>
    </div>
</div>
@endsection
