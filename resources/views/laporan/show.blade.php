@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold mb-5 text-white">Detail Laporan</h1>

<div class="bg-green-800 p-5 rounded text-white">

    <p><b>Tanggal:</b> {{ $laporan->created_at }}</p>

    <p class="mt-3"><b>Catatan:</b></p>
    <p>{{ $laporan->catatan }}</p>

</div>

@endsection