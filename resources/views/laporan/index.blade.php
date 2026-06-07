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
                    
                    @forelse($laporans as $laporan)
                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="w-14 h-14 rounded-lg overflow-hidden border border-botanical-700 bg-botanical-900 flex items-center justify-center text-gray-500">
                                @if($laporan->foto)
                                    <img src="{{ Storage::disk('supabase')->url($laporan->foto) }}" alt="Plant photo" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-white font-medium">{{ $laporan->tanaman->nama ?? 'Tanaman Terhapus' }}</p>
                            <p class="text-xs text-gray-500 mt-1">Dilaporkan: {{ $laporan->created_at->diffForHumans() }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full border border-botanical-700 bg-emerald-900 flex items-center justify-center text-emerald-400 text-[10px] font-bold">
                                    {{ substr($laporan->user->name ?? 'U', 0, 1) }}
                                </div>
                                <span class="text-gray-300">{{ $laporan->user->name ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-400 max-w-xs truncate" title="{{ $laporan->catatan }}">
                                "{{ \Illuminate\Support\Str::limit($laporan->catatan, 50) }}"
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Recorded
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('laporan.show', $laporan->id) }}" class="inline-flex items-center text-xs font-medium text-botanical-accent hover:text-emerald-300 transition px-2 py-1 rounded border border-botanical-accent/20 bg-botanical-accent/10 hover:bg-botanical-accent/20">
                                    Detail
                                </a>
                                <a href="{{ route('laporan.edit', $laporan->id) }}" class="inline-flex items-center text-xs font-medium text-yellow-500 hover:text-yellow-400 transition px-2 py-1 rounded border border-yellow-500/20 bg-yellow-500/10 hover:bg-yellow-500/20">
                                    Edit
                                </a>
                                <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus laporan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center text-xs font-medium text-red-400 hover:text-red-300 transition px-2 py-1 rounded border border-red-400/20 bg-red-400/10 hover:bg-red-400/20">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500 italic">
                            Belum ada laporan yang tersedia.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-botanical-700 text-sm text-gray-400">
            {{ $laporans->links() }}
        </div>
    </div>
</div>
@endsection
