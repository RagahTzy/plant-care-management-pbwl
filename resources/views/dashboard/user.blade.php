@extends('layouts.dashboard')

@section('title', 'User Dashboard')

@section('content')
<div class="welcome-msg mb-8">
    <h1 class="text-3xl font-bold text-white">Selamat Datang Kembali, {{ auth()->user()->name }}!</h1>
    <p class="text-gray-400">Koleksi tanamanmu dalam kondisi prima hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <x-card title="Tanaman Aktif" value="32" sub="Lokasi: Konservatori Utama" />
    <x-card title="Kelembaban Tanah" value="68%" badge="Normal" />
    <x-card title="Tugas Hari Ini" value="4" sub="Penyiraman & Pemupukan" />
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
            <th class="px-6 py-4">Suhu Ruang</th>
            <th class="px-6 py-4">Kondisi</th>
        </x-slot>
        
        <tr class="hover:bg-botanical-700/30 transition border-b border-botanical-700/50">
            <td class="px-6 py-4 text-white">Monstera King</td>
            <td class="px-6 py-4 text-gray-400">Ruang Tamu</td>
            <td class="px-6 py-4 text-gray-400">24°C</td>
            <td class="px-6 py-4">
                <span class="text-botanical-accent bg-botanical-accent/10 px-3 py-1 rounded-full text-xs">Terjaga</span>
            </td>
        </tr>
        <tr class="hover:bg-botanical-700/30 transition">
            <td class="px-6 py-4 text-white">Alocasia Black Velvet</td>
            <td class="px-6 py-4 text-gray-400">Kamar Kerja</td>
            <td class="px-6 py-4 text-gray-400">26°C</td>
            <td class="px-6 py-4">
                <span class="text-botanical-accent bg-botanical-accent/10 px-3 py-1 rounded-full text-xs">Optimal</span>
            </td>
        </tr>
    </x-table>
</div>
@endsection