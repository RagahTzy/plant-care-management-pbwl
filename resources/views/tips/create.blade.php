@extends('layouts.dashboard')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Tips</h1>

<form action="{{ route('tips.store') }}" method="POST">
    @csrf

    <input type="text" name="judul" placeholder="Judul"
        class="w-full mb-3 p-2 rounded text-black">

    <textarea name="deskripsi" placeholder="Deskripsi"
        class="w-full mb-3 p-2 rounded text-black"></textarea>

    <button class="bg-green-500 px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection