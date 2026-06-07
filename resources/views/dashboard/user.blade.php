@extends('layouts.dashboard')

@section('title', 'User Dashboard')

@section('content')
<div class="welcome-msg mb-8">
    <h1 class="text-3xl font-bold text-white">Selamat Datang Kembali, {{ auth()->user()->name }}!</h1>
    <p class="text-gray-400">Koleksi tanamanmu dalam kondisi prima hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <x-card title="Tanaman Aktif" :value="$stats['tanaman_aktif']" sub="Spesimen terdaftar" />
    <x-card title="Laporan Saya" :value="$stats['laporan_saya']" sub="Riwayat pertumbuhan" />
    <x-card title="Tugas Hari Ini" :value="$stats['tugas_hari_ini']" badge="{{ $stats['tugas_hari_ini'] > 0 ? 'Penting' : 'Selesai' }}" />
</div>

<div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-white">Daftar Pantauan Terbaru</h2>
        <a href="{{ route('tanaman.index') }}" class="text-botanical-accent text-sm hover:underline">Lihat Semua →</a>
    </div>

    <x-table>
        <x-slot name="head">
            <th class="px-6 py-4">Tanaman</th>
            <th class="px-6 py-4">Penempatan</th>
            <th class="px-6 py-4">Spesies</th>
            <th class="px-6 py-4">Status</th>
        </x-slot>
        
        @forelse($pantauanTerbaru as $tanaman)
        <tr class="hover:bg-botanical-700/30 transition border-b border-botanical-700/50">
            <td class="px-6 py-4 text-white">{{ $tanaman->nama }}</td>
            <td class="px-6 py-4 text-gray-400">{{ $tanaman->lokasi->nama ?? 'Belum Diatur' }}</td>
            <td class="px-6 py-4 text-gray-400">{{ $tanaman->spesies ?? '-' }}</td>
            <td class="px-6 py-4">
                <span class="text-botanical-accent bg-botanical-accent/10 px-3 py-1 rounded-full text-xs">Aktif</span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-6 py-10 text-center text-gray-500 italic">Belum ada koleksi tanaman.</td>
        </tr>
        @endforelse
    </x-table>
</div>
@endsection