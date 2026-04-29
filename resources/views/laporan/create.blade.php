@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-5 text-white">Tambah Laporan</h1>

<form action="{{ route('laporan.store') }}" method="POST">
    @csrf

    <textarea name="catatan" placeholder="Isi laporan..." 
        class="w-full p-3 rounded mb-3"></textarea>

    <button class="bg-green-500 px-4 py-2 rounded text-white">
        Simpan
    </button>

</form>

@endsection