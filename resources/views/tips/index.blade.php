@extends('layouts.dashboard')

@section('content')

<h1 class="text-2xl font-bold text-white mb-6">Tips Perawatan</h1>

<!-- 🔥 CARD STATS -->
<div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Total Tips</p>
        <h2 class="text-2xl font-bold">{{ $tips->count() }}</h2>
    </div>

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Tips Terbaru</p>
        <h2 class="text-lg font-bold">
            {{ $tips->first()->judul ?? '-' }}
        </h2>
    </div>

    <div class="bg-green-700 p-4 rounded-lg text-white">
        <p>Status</p>
        <h2 class="text-2xl font-bold">Aktif</h2>
    </div>

</div>


<!-- 📋 TABLE -->
<div class="bg-green-900 p-5 rounded-lg text-white">

    <div class="flex justify-between mb-3">
        <h2>Data Tips</h2>

        <a href="{{ route('tips.create') }}" 
           class="bg-green-500 px-3 py-1 rounded">
           + Tambah
        </a>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-green-600">
                <th class="text-left py-2">Judul</th>
                <th class="text-left">Deskripsi</th>
                <th class="text-left">Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($tips as $tip)
            <tr class="border-b border-green-700">

                <td class="py-2 font-semibold">
                    {{ $tip->judul }}
                </td>

                <td>
                    {{ Str::limit($tip->deskripsi, 50) }}
                </td>

                <td>
                    {{ $tip->created_at->format('d M Y') }}
                </td>

                <td class="space-x-1">

                    <!-- 🔍 Detail -->
                    <a href="{{ route('tips.show', $tip->id) }}"
                       class="bg-blue-500 px-2 py-1 rounded text-xs">
                        Detail
                    </a>

                    <!-- ✏️ Edit -->
                    <a href="{{ route('tips.edit', $tip->id) }}"
                       class="bg-yellow-500 px-2 py-1 rounded text-xs">
                        Edit
                    </a>

                    <!-- 🗑️ Delete -->
                    <form action="{{ route('tips.destroy', $tip->id) }}" 
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
                    Belum ada tips 😢
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection