@extends('layouts.dashboard')

@section('title', 'Dashboard User')

@section('dashboard')
<div class="grid gap-6 xl:grid-cols-[1.4fr_0.6fr]">
    <div class="space-y-6">
        <div class="grid gap-4 sm:grid-cols-3">
            <x-components.card title="Total Tanaman" subtitle="Jumlah tanaman aktif">
                <p class="text-3xl font-semibold text-white">18</p>
                <p class="mt-2 text-sm text-[#b8d3ba]">Data perawatan dan riwayat lengkap</p>
            </x-components.card>
            <x-components.card title="Jadwal Hari Ini" subtitle="Perawatan terjadwal">
                <p class="text-3xl font-semibold text-white">5</p>
                <p class="mt-2 text-sm text-[#b8d3ba]">Penyiraman dan pemupukan</p>
            </x-components.card>
            <x-components.card title="Laporan" subtitle="Kirim & riwayat laporan">
                <p class="text-3xl font-semibold text-white">12</p>
                <p class="mt-2 text-sm text-[#b8d3ba]">Ringkasan catatan terbaru</p>
            </x-components.card>
        </div>

        <x-components.card title="Jadwal Hari Ini" subtitle="Kegiatan perawatan" class="p-0">
            <div class="divide-y divide-white/10">
                @foreach (['Menyiram Monstera', 'Cek kelembaban tanah', 'Beri pupuk ringan'] as $item)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="font-semibold text-white">{{ $item }}</p>
                            <p class="text-sm text-[#b8d3ba]">08:00 · Tanaman rumah</p>
                        </div>
                        <span class="rounded-full bg-[#16321f] px-3 py-1 text-xs text-[#b5d6b5]">Belum selesai</span>
                    </div>
                @endforeach
            </div>
        </x-components.card>

        <x-components.card title="Notifikasi" subtitle="Update terbaru dari perawatan">
            <div class="space-y-4 text-sm text-[#d7e5d4]">
                <p class="rounded-3xl bg-[#0f2b17] p-4">Daun baru pada Monstera sudah 75% terbuka.</p>
                <p class="rounded-3xl bg-[#0f2b17] p-4">Jadwal penyiraman Spathiphyllum hari ini.</p>
            </div>
        </x-components.card>
    </div>

    <aside class="space-y-6">
        <x-components.card title="Ringkasan Kesehatan" subtitle="Tanamanmu saat ini">
            <div class="space-y-4 text-sm text-[#d7e5d4]">
                <div class="flex items-center justify-between rounded-3xl bg-[#0f2b17] px-4 py-4">
                    <span>Total kesehatan</span>
                    <span class="font-semibold text-[#55c17f]">Sangat Baik</span>
                </div>
                <div class="rounded-3xl bg-[#0f2b17] p-4">
                    <p class="font-semibold text-white">Perhatian</p>
                    <p class="mt-2 text-[#b8d3ba]">Pantau kelembaban tanah selama cuaca panas.</p>
                </div>
            </div>
        </x-components.card>
    </aside>
</div>
@endsection
