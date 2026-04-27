<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tanaman — Botanical Curator</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="app-wrapper">

    @include('components.sidebar')

    <div class="main-area">

        @include('components.navbar', [
            'section'   => 'Tanaman',
            'pageTitle' => 'Detail Tanaman',
        ])

        <main class="content">

            @php
            // Dummy data — in real app, this comes from controller
            $tanaman = [
                'id'          => 1,
                'nama'        => 'Monstera Deliciosa',
                'spesies'     => 'Araceae · Monstera',
                'status'      => 'sehat',
                'emoji'       => '🌿',
                'ruangan'     => 'Living Room',
                'tinggi'      => '120 cm',
                'umur'        => '2 tahun',
                'terakhir'    => '2 hari lalu',
                'jadwal'      => 'Setiap 3 hari',
                'cahaya'      => 'Indirect Bright',
                'suhu'        => '18–27°C',
                'kelembaban'  => '60–80%',
                'media_tanam' => 'Perlite + Potting Mix',
                'pupuk'       => 'Setiap 2 minggu (Musim Tumbuh)',
                'deskripsi'   => 'Monstera Deliciosa, dikenal sebagai "Swiss Cheese Plant", adalah tanaman tropis ikonik dari keluarga Araceae. Daun berlubangnya yang unik merupakan adaptasi alami terhadap angin kencang di habitat aslinya di hutan hujan tropis Amerika Tengah. Tanaman ini tumbuh baik di cahaya tidak langsung yang terang, menjadikannya pilihan sempurna untuk interior ruangan modern.',
                'tips'        => [
                    'Siram ketika 2–3 inci lapisan atas tanah terasa kering',
                    'Lap daun dengan kain lembab untuk menghilangkan debu',
                    'Berikan penopang seperti moss pole agar tumbuh tegak',
                    'Hindari paparan sinar matahari langsung yang dapat membakar daun',
                ],
                'laporan' => [
                    ['tanggal'=>'14 Okt 2024', 'aksi'=>'Penyiraman',  'catatan'=>'Kondisi baik, daun segar'],
                    ['tanggal'=>'10 Okt 2024', 'aksi'=>'Pemupukan',   'catatan'=>'Nutrient Mix A diterapkan'],
                    ['tanggal'=>'02 Okt 2024', 'aksi'=>'Repotting',   'catatan'=>'Dipindahkan ke pot 30cm'],
                ],
            ];
            @endphp

            {{-- Breadcrumb --}}
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <span class="sep">›</span>
                <a href="{{ route('tanaman.index') }}">Tanaman</a>
                <span class="sep">›</span>
                <span class="current">{{ $tanaman['nama'] }}</span>
            </div>

            {{-- Hero Section --}}
            <div class="plant-detail-header">

                {{-- Plant Image --}}
                <div class="plant-detail-img">
                    <span>{{ $tanaman['emoji'] }}</span>
                    <span class="plant-status-badge status-{{ $tanaman['status'] }}" style="position:absolute;top:16px;right:16px;">
                        ✓ {{ ucfirst($tanaman['status']) }}
                    </span>
                </div>

                {{-- Plant Info --}}
                <div class="plant-detail-info">
                    <div>
                        <div class="detail-name">{{ $tanaman['nama'] }}</div>
                        <div class="detail-species">{{ $tanaman['spesies'] }}</div>
                    </div>

                    <p class="detail-description">{{ $tanaman['deskripsi'] }}</p>

                    {{-- Care Overview --}}
                    <div class="care-grid">
                        <div class="care-item">
                            <div class="care-icon">💧</div>
                            <div class="care-label">Jadwal Air</div>
                            <div class="care-value">{{ $tanaman['jadwal'] }}</div>
                        </div>
                        <div class="care-item">
                            <div class="care-icon">☀️</div>
                            <div class="care-label">Cahaya</div>
                            <div class="care-value">{{ $tanaman['cahaya'] }}</div>
                        </div>
                        <div class="care-item">
                            <div class="care-icon">🌡️</div>
                            <div class="care-label">Suhu</div>
                            <div class="care-value">{{ $tanaman['suhu'] }}</div>
                        </div>
                        <div class="care-item">
                            <div class="care-icon">💦</div>
                            <div class="care-label">Kelembaban</div>
                            <div class="care-value">{{ $tanaman['kelembaban'] }}</div>
                        </div>
                        <div class="care-item">
                            <div class="care-icon">📏</div>
                            <div class="care-label">Tinggi</div>
                            <div class="care-value">{{ $tanaman['tinggi'] }}</div>
                        </div>
                        <div class="care-item">
                            <div class="care-icon">🕐</div>
                            <div class="care-label">Umur</div>
                            <div class="care-value">{{ $tanaman['umur'] }}</div>
                        </div>
                    </div>

                    {{-- Quick Actions --}}
                    <div class="quick-actions">
                        <a href="#" class="btn btn-primary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Jadwal Perawatan
                        </a>
                        <a href="#" class="btn btn-ghost">
                            💡 Growth Tips
                        </a>
                        <a href="{{ route('laporan.index') }}" class="btn btn-outline">
                            📋 Lihat Laporan
                        </a>
                        <a href="#" class="btn btn-outline" style="color:#e85d5d;border-color:rgba(232,93,93,.25);">
                            ✏️ Edit
                        </a>
                    </div>

                </div>
            </div>

            {{-- Detail Two-Col --}}
            <div class="two-col">

                {{-- Tips & Notes --}}
                <div style="display:flex;flex-direction:column;gap:20px;">

                    {{-- Care Tips --}}
                    <div class="card">
                        <div class="card-title">🌱 Tips Perawatan</div>
                        <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:10px;margin-top:12px;">
                            @foreach($tanaman['tips'] as $tip)
                            <li style="display:flex;gap:10px;align-items:flex-start;">
                                <span style="color:var(--accent);font-size:1rem;margin-top:1px;">✦</span>
                                <span style="font-size:.88rem;color:var(--text-muted);line-height:1.6;">{{ $tip }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Media Tanam --}}
                    <div class="card">
                        <div class="card-title">🪨 Media Tanam & Nutrisi</div>
                        <div style="margin-top:12px;display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            <div>
                                <div style="font-size:.75rem;text-transform:uppercase;letter-spacing:1px;color:var(--text-muted);margin-bottom:4px;">Media Tanam</div>
                                <div style="font-size:.9rem;font-weight:600;">{{ $tanaman['media_tanam'] }}</div>
                            </div>
                            <div>
                                <div style="font-size:.75rem;text-transform:uppercase;letter-spacing:1px;color:var(--text-muted);margin-bottom:4px;">Pupuk</div>
                                <div style="font-size:.9rem;font-weight:600;">{{ $tanaman['pupuk'] }}</div>
                            </div>
                        </div>

                        {{-- Health Progress --}}
                        <div style="margin-top:18px;">
                            <div class="flex-between mb-8">
                                <span style="font-size:.8rem;color:var(--text-muted);">Kesehatan Keseluruhan</span>
                                <span style="font-size:.8rem;font-weight:600;color:var(--accent);">87%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-fill" style="width:87%"></div>
                            </div>
                        </div>
                        <div style="margin-top:12px;">
                            <div class="flex-between mb-8">
                                <span style="font-size:.8rem;color:var(--text-muted);">Kelembaban Tanah</span>
                                <span style="font-size:.8rem;font-weight:600;color:var(--accent);">62%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-fill" style="width:62%"></div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Recent Log --}}
                <div>
                    <div class="card">
                        <div class="card-title">📝 Log Perawatan Terbaru</div>
                        <div style="margin-top:12px;display:flex;flex-direction:column;gap:0;">
                            @foreach($tanaman['laporan'] as $l)
                            <div class="schedule-item">
                                <div style="flex:1;">
                                    <div style="font-weight:600;font-size:.9rem;margin-bottom:3px;">{{ $l['aksi'] }}</div>
                                    <div style="font-size:.78rem;color:var(--text-muted);">{{ $l['catatan'] }}</div>
                                    <div style="font-size:.72rem;color:var(--text-muted);margin-top:4px;opacity:.7;">{{ $l['tanggal'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a href="{{ route('laporan.index') }}" class="btn btn-outline btn-sm" style="width:100%;justify-content:center;margin-top:12px;">
                            Lihat Semua Laporan →
                        </a>
                    </div>

                    {{-- Location Card --}}
                    <div class="card" style="margin-top:18px;">
                        <div class="card-title">📍 Lokasi Tanaman</div>
                        <div style="margin-top:14px;background:rgba(111,207,151,0.07);border:1px solid var(--border);border-radius:var(--radius-sm);padding:16px;text-align:center;">
                            <div style="font-size:2rem;margin-bottom:8px;">🏠</div>
                            <div style="font-weight:600;font-size:1rem;">{{ $tanaman['ruangan'] }}</div>
                            <div style="font-size:.78rem;color:var(--text-muted);margin-top:4px;">Terakhir dipindah: {{ $tanaman['terakhir'] }}</div>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>
</body>
</html>