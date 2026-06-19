@extends('layouts.dashboard')

@section('title', 'Manajemen Lokasi - Plant Care Management System')

@section('content')
<x-slot name="header">
    <x-navbar 
        section="PENGATURAN" 
        pageTitle="Daftar Lokasi" 
        :addRoute="'admin.lokasi.create'" 
    />
</x-slot>

<div class="max-w-7xl mx-auto space-y-6 pb-12">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Area & Lokasi Penempatan</h2>
            <p class="text-gray-400 text-sm mt-1">Kelola daftar area penempatan spesimen tanaman.</p>
        </div>

        <a href="{{ route('admin.lokasi.create') }}" class="inline-flex items-center gap-2 bg-emerald-500 text-[#0B100D] px-4 py-3 rounded-2xl font-semibold uppercase tracking-wider hover:bg-emerald-400 transition">
            <span class="text-xl leading-none">+</span>
            <span>Tambah Lokasi</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <x-table>
            <x-slot name="head">
                <th class="px-6 py-4">Nama Lokasi</th>
                <th class="px-6 py-4">Deskripsi / Keterangan</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </x-slot>

            @forelse($lokasis as $lokasi)
                <tr class="hover:bg-botanical-700/30 transition border-b border-botanical-700/50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-botanical-900 flex items-center justify-center text-lg border border-botanical-700">📍</div>
                            <span class="text-white font-medium">{{ $lokasi->nama }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-400 text-sm">
                        {{ $lokasi->deskripsi ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-1 whitespace-nowrap">
                        <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}" class="inline-flex text-[10px] uppercase tracking-tighter bg-yellow-500/10 text-yellow-500 px-2 py-1.5 rounded border border-yellow-500/20 hover:bg-yellow-500 hover:text-black transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.lokasi.destroy', $lokasi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus lokasi ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="inline-flex text-[10px] uppercase tracking-tighter bg-red-500/10 text-red-400 px-2 py-1.5 rounded border border-red-500/20 hover:bg-red-500 hover:text-white transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <div class="text-5xl mb-4 opacity-30">🗺️</div>
                            <p class="text-gray-500">Belum ada lokasi yang terdaftar.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </x-table>
    </div>
</div>
@endsection