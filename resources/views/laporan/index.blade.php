<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanaman Saya — Botanical Curator</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="app-wrapper">

    @include('components.sidebar')

    <div class="main-area">

        @include('components.navbar', [
            'section'   => 'Koleksi',
            'pageTitle' => 'Tanaman Saya',
        ])

        <main class="content">

            @php
            $tanaman = [
                ['id'=>1,'nama'=>'Monstera Deliciosa','spesies'=>'Araceae','status'=>'sehat',    'emoji'=>'🌿','ruangan'=>'Living Room','jadwal'=>'Setiap 3 hari','tinggi'=>'120 cm','terakhir'=>'2 hari lalu'],
                ['id'=>2,'nama'=>'Sansevieria Trifasciata','spesies'=>'Asparagaceae','status'=>'sehat','emoji'=>'🌵','ruangan'=>'Bedroom','jadwal'=>'Setiap 7 hari','tinggi'=>'65 cm','terakhir'=>'5 hari lalu'],
                ['id'=>3,'nama'=>'Ficus Elastica','spesies'=>'Moraceae','status'=>'perlu-air','emoji'=>'🌳','ruangan'=>'Balcony','jadwal'=>'Setiap 5 hari','tinggi'=>'90 cm','terakhir'=>'8 hari lalu'],
                ['id'=>4,'nama'=>'Calathea Ornata','spesies'=>'Marantaceae','status'=>'sakit',  'emoji'=>'🪴','ruangan'=>'Studio','jadwal'=>'Setiap 2 hari','tinggi'=>'45 cm','terakhir'=>'1 hari lalu'],
                ['id'=>5,'nama'=>'Pothos Aureum','spesies'=>'Araceae','status'=>'sehat',        'emoji'=>'🌱','ruangan'=>'Kitchen','jadwal'=>'Setiap 4 hari','tinggi'=>'55 cm','terakhir'=>'3 hari lalu'],
                ['id'=>6,'nama'=>'ZZ Plant','spesies'=>'Zamioculcas','status'=>'sehat',         'emoji'=>'🌾','ruangan'=>'Office','jadwal'=>'Setiap 10 hari','tinggi'=>'70 cm','terakhir'=>'9 hari lalu'],
                ['id'=>7,'nama'=>'Peace Lily','spesies'=>'Spathiphyllum','status'=>'perlu-air','emoji'=>'💐','ruangan'=>'Bathroom','jadwal'=>'Setiap 3 hari','tinggi'=>'50 cm','terakhir'=>'4 hari lalu'],
                ['id'=>8,'nama'=>'Rubber Plant','spesies'=>'Ficus elastica','status'=>'sehat', 'emoji'=>'🌴','ruangan'=>'Dining Room','jadwal'=>'Setiap 6 hari','tinggi'=>'110 cm','terakhir'=>'1 hari lalu'],
            ];
            @endphp

            {{-- Page Header --}}
            <div class="page-header">
                <div class="page-header-left">
                    <h1>Tanaman Saya</h1>
                    <p>{{ count($tanaman) }} tanaman dalam koleksi Anda</p>
                </div>
                <div class="page-header-actions">
                    <button class="btn btn-outline">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                        List View
                    </button>
                    <a href="#" class="btn btn-primary">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Tambah Tanaman
                    </a>
                </div>
            </div>

            {{-- Filter Bar --}}
            <div class="filter-bar">
                <button class="filter-chip active">Semua ({{ count($tanaman) }})</button>
                <button class="filter-chip">✅ Sehat</button>
                <button class="filter-chip">💧 Perlu Air</button>
                <button class="filter-chip">🚨 Sakit</button>
                <button class="filter-chip">🌿 Dalam Ruangan</button>
                <button class="filter-chip">🌤️ Luar Ruangan</button>
            </div>

            {{-- Plant Grid --}}
            <div class="plant-grid">
                @foreach($tanaman as $t)
                <a href="{{ route('tanaman.show', $t['id']) }}" class="plant-card">
                    <div class="plant-card-img">
                        <span>{{ $t['emoji'] }}</span>
                        <span class="plant-status-badge status-{{ $t['status'] }}">
                            @if($t['status']==='sehat') ✓ Sehat
                            @elseif($t['status']==='perlu-air') 💧 Perlu Air
                            @else 🚨 Sakit @endif
                        </span>
                    </div>
                    <div class="plant-card-body">
                        <h3>{{ $t['nama'] }}</h3>
                        <div class="plant-species">{{ $t['spesies'] }}</div>
                        <div class="flex gap-8" style="flex-wrap:wrap;">
                            <span class="meta-chip text-sm">
                                📍 {{ $t['ruangan'] }}
                            </span>
                            <span class="meta-chip text-sm">
                                📏 {{ $t['tinggi'] }}
                            </span>
                        </div>
                    </div>
                    <div class="plant-card-footer">
                        <div class="water-info">
                            <span>💧</span>
                            <span>{{ $t['jadwal'] }}</span>
                        </div>
                        <span class="btn btn-ghost btn-sm">Detail →</span>
                    </div>
                </a>
                @endforeach
            </div>

        </main>
    </div>
</div>

<style>
/* Local overrides for filter interactivity */
.filter-chip { cursor: pointer; }
.filter-chip:not(.active):hover { border-color: rgba(111,207,151,.5); color: var(--text-main); }
</style>
</body>
</html>