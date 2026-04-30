@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-4">{{ $tip->judul }}</h1>

<div class="bg-green-800 p-5 rounded shadow">
    <p class="text-gray-200">{{ $tip->deskripsi }}</p>
</div>

<a href="{{ route('tips.index') }}"
   class="inline-block mt-4 text-blue-300 hover:underline">
   ← Kembali
</a>

@endsection