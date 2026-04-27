<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Botanical Curator</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="app-wrapper">

    @include('components.sidebar')

    <div class="main-area">

        @include('components.navbar', [
            'section'   => 'Maintenance Hub',
            'pageTitle' => 'Jadwal Perawatan',
        ])

        <main class="content">

            {{-- Dummy Data --}}
            @php
            $stats = [
                ['label'=>'HIGH PRIORITY',  'value'=>'04', 'sub'=>'Overdue Tasks',        'icon'=>'⚠️', 'accent'=>false],
                ['label'=>'COMING UP',      'value'=>'12', 'sub'=>'Scheduled for Today',  'icon'=>'⏰', 'accent'=>true],
                ['label'=>'QUEUE',          'value'=>'28', 'sub'=>'Pending Maintenance',  'icon'=>'📋', 'accent'=>false],
                ['label'=>'TOTAL TANAMAN',  'value'=>'47', 'sub'=>'Dalam koleksi Anda',   'icon'=>'🌿', 'accent'=>false],
            ];

            $jadwal = [
                ['jam'=>'08','period'=>'AM','task'=>'Watering: Monstera Variegata','lokasi'=>'Living Room','detail'=>'500ml Filtered','emoji'=>'🌿','color'=>'#e85d5d'],
                ['jam'=>'10','period'=>'AM','task'=>'Soil Aeration: Sansevieria',  'lokasi'=>'Bedroom',    'detail'=>'Routine Check',  'emoji'=>'🌵','color'=>'#2FA084'],
                ['jam'=>'02','period'=>'PM','task'=>'Fertilizing: Ficus Elastica', 'lokasi'=>'Balcony',    'detail'=>'Nutrient Mix A', 'emoji'=>'🌳','color'=>'#6FCF97'],
                ['jam'=>'04','period'=>'PM','task'=>'Repotting: Calathea Ornata',  'lokasi'=>'Studio',     'detail'=>'Pot 22cm',       'emoji'=>'🪴','color'=>'#2FA084'],
            ];
            @endphp

            {{-- Stat Cards --}}
            <div class="stat-grid">
                @foreach($stats as $s)
                <div class="stat-card {{ $s['accent'] ? 'accent' : '' }}">
                    <div class="stat-icon">{{ $s['icon'] }}</div>
                    <div class="stat-label">{{ $s['label'] }}</div>
                    <div class="stat-value">{{ $s['value'] }}</div>
                    <div class="stat-sub">{{ $s['sub'] }}</div>
                    <div class="stat-bg">{{ $s['emoji'] ?? '🌿' }}</div>
                </div>
                @endforeach
            </div>

            {{-- Two-column layout --}}
            <div class="two-col">

                {{-- Schedule --}}
                <div>
                    <h2 class="section-title">Next 24 Hours</h2>
                    <div class="card">
                        @foreach($jadwal as $j)
                        <div class="schedule-item">
                            <div class="schedule-time">
                                <div class="hour">{{ $j['jam'] }}</div>
                                <div class="period">{{ $j['period'] }}</div>
                            </div>
                            <div class="schedule-indicator" style="background:{{ $j['color'] }}"></div>
                            <div class="schedule-plant-img">{{ $j['emoji'] }}</div>
                            <div class="schedule-info">
                                <div class="task-name">{{ $j['task'] }}</div>
                                <div class="schedule-meta">
                                    <span class="meta-chip">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        {{ $j['lokasi'] }}
                                    </span>
                                    <span class="meta-chip" style="color:var(--accent)">
                                        🔵 {{ $j['detail'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="schedule-actions">
                                <button class="btn btn-outline btn-sm">Tunda</button>
                                <button class="btn btn-ghost btn-sm">Selesai</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Right Column --}}
                <div style="display:flex;flex-direction:column;gap:20px;">

                    {{-- Mini Calendar --}}
                    <div class="card mini-calendar">
                        <div class="cal-header">
                            <h3>October 2024</h3>
                            <div style="display:flex;gap:6px;">
                                <button class="cal-nav-btn">‹</button>
                                <button class="cal-nav-btn">›</button>
                            </div>
                        </div>
                        <div class="cal-grid">
                            @foreach(['SU','MO','TU','WE','TH','FR','SA'] as $d)
                                <div class="cal-day-name">{{ $d }}</div>
                            @endforeach
                            @php
                            $days = [
                                ['n'=>29,'o'=>true,'e'=>false], ['n'=>30,'o'=>true,'e'=>false],
                                ['n'=>1,'o'=>false,'e'=>false], ['n'=>2,'o'=>false,'e'=>false],
                                ['n'=>3,'o'=>false,'e'=>false], ['n'=>4,'o'=>false,'t'=>true,'e'=>false],
                                ['n'=>5,'o'=>false,'e'=>false], ['n'=>6,'o'=>false,'e'=>true],
                                ['n'=>7,'o'=>false,'e'=>true],  ['n'=>8,'o'=>false,'e'=>false],
                                ['n'=>9,'o'=>false,'e'=>false],  ['n'=>10,'o'=>false,'e'=>true],
                                ['n'=>11,'o'=>false,'e'=>false], ['n'=>12,'o'=>false,'e'=>false],
                            ];
                            @endphp
                            @foreach($days as $d)
                            <div class="cal-day
                                {{ !empty($d['o']) ? 'other-month' : '' }}
                                {{ !empty($d['t']) ? 'today' : '' }}
                                {{ !empty($d['e']) ? 'has-event' : '' }}">
                                {{ $d['n'] }}
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Environmental Conditions --}}
                    <div class="card env-card">
                        <h3>
                            Env. Conditions
                            <span style="font-size:1.2rem;">☀️</span>
                        </h3>
                        <div class="env-item">
                            <div class="env-item-header">
                                <span>Humidity</span>
                                <span>64%</span>
                            </div>
                            <div class="env-bar">
                                <div class="env-bar-fill" style="width:64%"></div>
                            </div>
                        </div>
                        <div class="env-item">
                            <div class="env-item-header">
                                <span>Avg Temp</span>
                                <span>22°C</span>
                            </div>
                            <div class="env-bar">
                                <div class="env-bar-fill" style="width:55%"></div>
                            </div>
                        </div>
                        <div class="env-item">
                            <div class="env-item-header">
                                <span>Light Level</span>
                                <span>Medium</span>
                            </div>
                            <div class="env-bar">
                                <div class="env-bar-fill" style="width:45%"></div>
                            </div>
                        </div>
                        <p class="env-note">☁️ Expected rain tomorrow: increase humidity for tropical plants.</p>
                    </div>

                </div>{{-- end right col --}}
            </div>{{-- end two-col --}}

        </main>
    </div>
</div>
</body>
</html>