@extends('layouts.dashboard')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Jadwal</h1>

<form action="{{ route('jadwal.store') }}" method="POST">
    @csrf

    <input type="date" name="tanggal"
        class="w-full mb-3 p-2 text-black rounded">

    <input type="text" name="aktivitas" placeholder="Aktivitas"
        class="w-full mb-3 p-2 text-black rounded">

    <button class="bg-green-500 px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection