resources/views/layouts/auth.blade.php

@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1.2fr_1fr] items-center max-w-7xl w-full">
        <section class="rounded-[32px] border border-white/10 bg-[#112714]/95 p-8 shadow-[0_32px_80px_rgba(0,0,0,0.35)] backdrop-blur-xl">
            <div class="mb-8 space-y-3">
                <p class="text-sm uppercase tracking-[0.24em] text-[#7fbf96]">Plant Care Management System</p>
                <h1 class="text-3xl font-semibold text-white">@yield('title', 'Akses Akun')</h1>
                <p class="text-sm leading-6 text-[#b5d6b5]">Masuk untuk mengelola tanaman, jadwal, tips, dan laporan perawatan.</p>
            </div>
            @yield('auth')
        </section>
        <aside class="rounded-[32px] bg-[#0d1f11] p-8 shadow-[0_32px_80px_rgba(0,0,0,0.35)] border border-white/10">
            <div class="space-y-6">
                <div class="rounded-3xl bg-[#0f2b17] p-5 border border-white/10 shadow-sm">
                    <p class="text-sm text-[#8dc8a8]">Sudah menjadi member?</p>
                    <p class="mt-2 text-2xl font-semibold">Gabung bersama komunitas pecinta tanaman.</p>
                </div>
                <div class="rounded-3xl bg-[#112714] p-5 border border-white/10">
                    <p class="text-sm text-[#b5d6b5]">Fitur yang tersedia:</p>
                    <ul class="mt-4 space-y-3 text-sm text-[#d9edd5]">
                        <li>• Dashboard personal dan admin</li>
                        <li>• Manajemen tanaman, jadwal, tips, laporan</li>
                        <li>• Notifikasi dan status kesehatan</li>
                        <li>• Desain sesuai tema figma</li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
