@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('dashboard')
<div class="space-y-6">
    <div class="grid gap-4 xl:grid-cols-4">
        <x-components.card title="Total User" subtitle="Akun terdaftar">
            <p class="text-3xl font-semibold text-white">42</p>
        </x-components.card>
        <x-components.card title="Tanaman" subtitle="Data tanaman">
            <p class="text-3xl font-semibold text-white">120</p>
        </x-components.card>
        <x-components.card title="Laporan" subtitle="Laporan dikirim">
            <p class="text-3xl font-semibold text-white">76</p>
        </x-components.card>
        <x-components.card title="Jadwal" subtitle="Agenda aktif">
            <p class="text-3xl font-semibold text-white">34</p>
        </x-components.card>
    </div>

    <x-components.card title="Ringkasan Aktivitas" subtitle="Kegiatan terakhir" class="p-0">
        <div class="divide-y divide-white/10">
            @foreach (['User baru terdaftar','Tanaman baru ditambahkan','Laporan validasi selesai'] as $activity)
                <div class="px-6 py-4">
                    <p class="text-sm text-[#d7e5d4]">{{ $activity }}</p>
                </div>
            @endforeach
        </div>
    </x-components.card>
</div>
@endsection
