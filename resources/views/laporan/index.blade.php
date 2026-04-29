@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold text-white mb-6">Laporan Pertumbuhan</h1>

<!-- 🔥 CARD STATS -->
<div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Total Laporan</p>
        <h2 class="text-2xl font-bold">{{ $laporans->count() }}</h2>
    </div>

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Rata-rata</p>
        <h2 class="text-2xl font-bold">Aktif</h2>
    </div>

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Data Masuk</p>
        <h2 class="text-2xl font-bold">{{ $laporans->count() }}</h2>
    </div>

</div>


<!-- 📊 GRAFIK (simple dulu) -->
<div class="bg-green-800 p-5 rounded-lg mb-6 text-white">
    <h2 class="mb-3">Grafik Laporan</h2>

    <div class="h-40 flex items-end gap-2">
        @foreach($laporans as $laporan)
            <div class="bg-green-400 w-6"
                 style="height: {{ rand(30,100) }}px">
            </div>
        @endforeach
    </div>
</div>


<!-- 📋 TABEL -->
<div class="bg-green-900 p-5 rounded-lg text-white">

    <div class="flex justify-between mb-3">
        <h2>Data Laporan</h2>

        <a href="{{ route('laporan.create') }}" 
           class="bg-green-500 px-3 py-1 rounded">
           + Tambah
        </a>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-green-600">
                <th class="text-left py-2">Tanggal</th>
                <th class="text-left">Catatan</th>
                <th class="text-left">Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($laporans as $laporan)
            <tr class="border-b border-green-700">
                <td class="py-2">
                    {{ $laporan->created_at->format('d M Y') }}
                </td>

                <td>{{ $laporan->catatan }}</td>

                <td>
                    <span class="bg-green-600 px-2 py-1 rounded text-xs">
                        Selesai
                    </span>
                </td>

                <td class="space-x-1">
                    <a href="{{ route('laporan.show', $laporan->id) }}"
                       class="bg-blue-500 px-2 py-1 rounded text-xs">
                        Detail
                    </a>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="4" class="text-center py-4">
                    Belum ada laporan 😢
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection