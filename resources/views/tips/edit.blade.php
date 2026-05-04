@extends('layouts.dashboard')

@section('content')

<h1 class="text-xl font-bold mb-4">Edit Tips</h1>

<form action="{{ route('tips.update', $tip->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="judul" value="{{ $tip->judul }}"
        class="w-full mb-3 p-2 rounded text-black">

    <textarea name="deskripsi"
        class="w-full mb-3 p-2 rounded text-black">{{ $tip->deskripsi }}</textarea>

    <button class="bg-yellow-500 px-4 py-2 rounded">
        Update
    </button>

</form>

@endsection