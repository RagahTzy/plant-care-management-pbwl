<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan — Botanical Curator</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="app-wrapper">

    @include('components.sidebar')

    <div class="main-area">

        @include('components.navbar', [
            'section'   => 'Laporan',
            'pageTitle' => 'Riwayat Laporan',
        ])

        <main class="content">

            @php
            $laporan = [
                [
                    'id'       => 1,
                    'tanaman'  => 'Monstera Deliciosa',
                    'aksi'     => 'Penyiraman',
                    'tanggal'  => '15 Oktober 2024',
                    'waktu'    => '08:32 AM',
                    'ringkasan'=> 'Penyiraman rutin dengan 500ml air filter. Daun terlihat segar dan bercahaya. Tidak ada tanda-tanda kekeringan atau overwatering.',
                    'emoji'    => '🌿',
                    'kategori' => 'air',
                    'lokasi'   => 'Living Room',
                    'kondisi'  => 'Baik',
                ],
                [
                    'id'       => 2,
                    'tanaman'  => 'Sansevieria Trifasciata',
                    'aksi'     => 'Soil Aeration',
                    'tanggal'  => '14 Oktober 2024',
                    'waktu'    => '10:15 AM',
                    'ringkasan'=> 'Aerasi tanah rutin menggunakan tusuk kayu. Media tanam terasa agak padat di bagian tengah. Kelembaban tanah 40%.',
                    'emoji'    => '🌵',
                    'kategori' => 'tanah',
                    'lokasi'   => 'Bedroom',
                    'kondisi'  => 'Perlu Perhatian',
                ],
                [
                    'id'       => 3,
                    'tanaman'  => 'Ficus Elastica',
                    'aksi'     => 'Pemupukan',
                    'tanggal'  => '13 Oktober 2024',
                    'waktu'    => '02:00 PM',
                    'ringkasan'=> 'Aplikasi Nutrient Mix A dengan dosis 10ml per liter air. Tanaman menunjukkan pertumbuhan daun baru yang baik sejak pemupukan bulan lalu.',
                    'emoji'    => '🌳',
                    'kategori' => 'pupuk',
                    'lokasi'   => 'Balcony',
                    'kondisi'  => 'Baik',
                ],
                [
                    'id'       => 4,
                    'tanaman'  => 'Calathea Ornata',
                    'aksi'     => 'Pengecekan Hama',
                    'tanggal'  => '12 Oktober 2024',
                    'waktu'    => '09:45 AM',
                    'ringkasan'=> 'Ditemukan bekas gigitan serangga kecil di beberapa daun. Telah diterapkan pestisida organik neem oil. Perlu monitoring 3 hari ke depan.',
                    'emoji'    => '🪴',
                    'kategori' => 'hama',
                    'lokasi'   => 'Studio',
                    'kondisi'  => 'Waspada',
                ],
                [
                    'id'       => 5,
                    'tanaman'  => 'Pothos Aureum',
                    'aksi'     => 'Repotting',
                    'tanggal'  => '10 Oktober 2024',
                    'waktu'    => '11:20 AM',
                    'ringkasan'=> 'Dipindahkan ke pot berdiameter 22cm. Akar sudah cukup padat di pot lama. Media tanam baru: campuran perlite dan potting mix 1:2.',
                    'emoji'    => '🌱',
                    'kategori' => 'pot',
                    'lokasi'   => 'Kitchen',
                    'kondisi'  => 'Baik',
                ],
                [
                    'id'       => 6,
                    'tanaman'  => 'ZZ Plant',
                    'aksi'     => 'Penyiraman',
                    'tanggal'  => '09 Oktober 2024',
                    'waktu'    => '03:30 PM',
                    'ringkasan'=> 'Penyiraman setelah 10 hari. Tanah sudah sangat kering. Tanaman terlihat sedikit layu namun akan pulih setelah penyiraman.',
                    'emoji'    => '🌾',
                    'kategori' => 'air',
                    'lokasi'   => 'Office',
                    'kondisi'  => 'Perlu Perhatian',
                ],
            ];

            $kondisiStyle = [
                'Baik'             => ['bg'=>'rgba(111,207,151,0.15)', 'color'=>'#6FCF97', 'border'=>'rgba(111,207,151,0.25)'],
                'Perlu Perhatian'  => ['bg'=>'rgba(47,160,132,0.15)',  'color'=>'#2FA084', 'border'=>'rgba(47,160,132,0.25)'],
                'Waspada'          => ['bg'=>'rgba(232,93,93,0.15)',   'color'=>'#e85d5d', 'border'=>'rgba(232,93,93,0.25)'],
            ];

            $kategoriIcon = [
                'air'   => '💧',
                'tanah' => '🪨',
                'pupuk' => '🌱',
                'hama'  => '🔍',
                'pot'   => '🏺',
            ];
            @endphp

            {{-- Page Header --}}
            <div class="page-header">
                <div class="page-header-left">
                    <h1>Riwayat Laporan</h1>
                    <p>{{ count($laporan) }} laporan tercatat bulan ini</p>
                </div>
                <div class="page-header-actions">
                    <button class="btn btn-outline">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        Export PDF
                    </button>
                    <button class="btn btn-primary">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Buat Laporan
                    </button>
                </div>
            </div>

            {{-- Summary Stats --}}
            <div class="stat-grid" style="margin-bottom:24px;">
                <div class="stat-card">
                    <div class="stat-icon">📝</div>
                    <div class="stat-label">Total Laporan</div>
                    <div class="stat-value">{{ count($laporan) }}</div>
                    <div class="stat-sub">Bulan Oktober 2024</div>
                </div>
                <div class="stat-card accent">
                    <div class="stat-icon">✅</div>
                    <div class="stat-label">Kondisi Baik</div>
                    <div class="stat-value">4</div>
                    <div class="stat-sub">67% dari total laporan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">⚠️</div>
                    <div class="stat-label">Perlu Tindak Lanjut</div>
                    <div class="stat-value">2</div>
                    <div class="stat-sub">Memerlukan perhatian</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🌿</div>
                    <div class="stat-label">Tanaman Terlibat</div>
                    <div class="stat-value">6</div>
                    <div class="stat-sub">Dari 47 koleksi</div>
                </div>
            </div>

            {{-- Filter --}}
            <div class="filter-bar">
                <button class="filter-chip active">Semua</button>
                <button class="filter-chip">💧 Penyiraman</button>
                <button class="filter-chip">🌱 Pemupukan</button>
                <button class="filter-chip">🪨 Aerasi Tanah</button>
                <button class="filter-chip">🔍 Pengecekan Hama</button>
                <button class="filter-chip">🏺 Repotting</button>
            </div>

            {{-- Laporan Grid --}}
            <div class="laporan-grid">
                @foreach($laporan as $l)
                @php $ks = $kondisiStyle[$l['kondisi']] ?? $kondisiStyle['Baik']; @endphp
                <div class="laporan-card">
                    {{-- Card Image/Header --}}
                    <div class="laporan-card-img" style="position:relative;">
                        <span>{{ $l['emoji'] }}</span>
                        {{-- Category badge --}}
                        <span style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,0.45);backdrop-filter:blur(4px);border-radius:99px;padding:3px 10px;font-size:.7rem;font-weight:600;color:var(--text-main);border:1px solid var(--border);">
                            {{ $kategoriIcon[$l['kategori']] ?? '' }} {{ ucfirst($l['kategori']) }}
                        </span>
                    </div>

                    <div class="laporan-card-body">
                        {{-- Meta row --}}
                        <div class="laporan-meta">
                            <div class="laporan-date">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                {{ $l['tanggal'] }} · {{ $l['waktu'] }}
                            </div>
                            <span style="padding:2px 9px;border-radius:99px;font-size:.68rem;font-weight:700;background:{{ $ks['bg'] }};color:{{ $ks['color'] }};border:1px solid {{ $ks['border'] }};">
                                {{ $l['kondisi'] }}
                            </span>
                        </div>

                        <h3>{{ $l['aksi'] }}: {{ $l['tanaman'] }}</h3>

                        <p>{{ Str::limit($l['ringkasan'], 120) }}</p>

                        <div style="display:flex;align-items:center;justify-content:space-between;">
                            <span style="font-size:.75rem;color:var(--text-muted);display:flex;align-items:center;gap:5px;">
                                📍 {{ $l['lokasi'] }}
                            </span>
                            <div style="display:flex;gap:8px;">
                                <button class="btn btn-ghost btn-sm">Detail</button>
                                <button class="btn btn-outline btn-sm">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination (dummy) --}}
            <div style="display:flex;justify-content:center;align-items:center;gap:8px;margin-top:32px;">
                <button class="btn btn-outline btn-sm">‹ Sebelumnya</button>
                @for($p=1;$p<=4;$p++)
                <button class="btn {{ $p===1 ? 'btn-primary' : 'btn-outline' }} btn-sm" style="min-width:36px;">{{ $p }}</button>
                @endfor
                <button class="btn btn-outline btn-sm">Berikutnya ›</button>
            </div>

        </main>
    </div>
</div>
</body>
</html>