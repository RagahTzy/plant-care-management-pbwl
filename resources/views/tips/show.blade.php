@extends('layouts.dashboard')

@section('title', 'Detail Tips - Botanical')

@section('content')
<div class="max-w-4xl mx-auto pb-12">
    <a href="{{ route('tips.index') }}" class="inline-flex items-center gap-2 text-emerald-500 hover:text-white transition mb-6 font-bold text-sm">
        ← KEMBALI KE DAFTAR
    </a>

    <div class="bg-botanical-800 rounded-3xl border border-botanical-700/50 p-10">
        <div class="mb-8">
            <span class="text-[10px] text-emerald-500 font-bold uppercase tracking-widest bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20">
                {{ optional($tip->tanaman)->nama ?? 'Tips Umum' }}
            </span>
            <h1 class="text-4xl text-white font-serif font-light mt-4">{{ $tip->judul }}</h1>
        </div>

        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed text-lg italic">
            {!! nl2br(e($tip->deskripsi)) !!}
        </div>
    </div>
</div>
@endsection