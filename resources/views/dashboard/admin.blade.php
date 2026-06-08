@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<x-slot name="header">
    <x-navbar section="OVERVIEW" pageTitle="Ringkasan Sistem" />
</x-slot>

<div class="max-w-7xl mx-auto space-y-8">
    <!-- Grid Kartu Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <x-card title="Total Tanaman" :value="$stats['total_tanaman']" sub="Terdaftar di sistem" />
        <x-card title="Jadwal Hari Ini" :value="$stats['jadwal_hari_ini']" badge="Penting" />
        <x-card title="Tips Perawatan" :value="$stats['total_tips']" sub="Tersedia untuk user" />
        <x-card title="Laporan Baru" :value="$stats['laporan_baru']" badge="Hari Ini" />
    </div>

    <!-- Area Tabel Ringkasan -->
    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <div class="p-6 border-b border-botanical-700 flex justify-between items-center">
            <h3 class="text-white font-medium">Laporan Pertumbuhan Terbaru</h3>
            <a href="{{ route('laporan.index') }}" class="text-emerald-500 text-xs hover:underline">Lihat Semua Laporan</a>
        </div>

        <x-table>
            <x-slot name="head">
                <th class="px-6 py-4">ID Laporan</th>
                <th class="px-6 py-4">Tanaman</th>
                <th class="px-6 py-4">Pemilik</th>
                <th class="px-6 py-4">Tgl Laporan</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </x-slot>

            @forelse($laporanTerbaru as $laporan)
            <tr class="hover:bg-botanical-700/30 transition border-b border-botanical-700/50">
                <td class="px-6 py-4 text-emerald-500 font-mono text-xs">#REP-{{ str_pad($laporan->id, 3, '0', STR_PAD_LEFT) }}</td>
                <td class="px-6 py-4 text-white font-medium">{{ $laporan->tanaman->nama ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $laporan->user->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $laporan->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('laporan.show', $laporan->id) }}" class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1.5 rounded-lg border border-emerald-500/20 hover:bg-emerald-500 hover:text-white transition">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">Belum ada laporan terbaru.</td>
            </tr>
            @endforelse
        </x-table>
    </div>
</div>
@endsection