@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold text-white mb-6">Jadwal Perawatan</h1>

<!-- 🔥 CARD STATS -->
<div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Total Jadwal</p>
        <h2 class="text-2xl font-bold">{{ $jadwals->count() }}</h2>
    </div>

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Belum Selesai</p>
        <h2 class="text-2xl font-bold">
            {{ $jadwals->where('status','!=','selesai')->count() }}
        </h2>
    </div>

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Selesai</p>
        <h2 class="text-2xl font-bold">
            {{ $jadwals->where('status','selesai')->count() }}
        </h2>
    </div>

</div>


<!-- 📋 TABLE -->
<div class="bg-green-900 p-5 rounded-lg text-white">

    <div class="flex justify-between mb-3">
        <h2>Data Jadwal</h2>

        <a href="{{ route('jadwal.create') }}" 
           class="bg-green-500 px-3 py-1 rounded">
           + Tambah
        </a>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-green-600">
                <th class="text-left py-2">Tanggal</th>
                <th class="text-left">Aktivitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($jadwals as $jadwal)
            <tr class="border-b border-green-700">

                <td class="py-2">
                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}
                </td>

                <td>{{ $jadwal->aktivitas }}</td>

                <td>
                    @if($jadwal->status == 'selesai')
                        <span class="bg-green-600 px-2 py-1 rounded text-xs">
                            Selesai
                        </span>
                    @else
                        <span class="bg-red-500 px-2 py-1 rounded text-xs">
                            Belum
                        </span>
                    @endif
                </td>

                <td class="space-x-1">

                    <!-- ✅ Tombol Selesai -->
                    @if($jadwal->status != 'selesai')
                    <form action="{{ route('jadwal.selesai', $jadwal->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button class="bg-green-600 px-2 py-1 rounded text-xs">
                            ✔
                        </button>
                    </form>
                    @endif

                    <!-- ✏️ Edit -->
                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" 
                       class="bg-yellow-500 px-2 py-1 rounded text-xs">
                        Edit
                    </a>

                    <!-- 🗑️ Delete -->
                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 px-2 py-1 rounded text-xs">
                            Hapus
                        </button>
                    </form>

                </td>

            </tr>

            @empty
            <tr>
                <td colspan="4" class="text-center py-4">
                    Belum ada jadwal 😢
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection