<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan — Botanical Curator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0B100D; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="text-gray-300">

<div class="flex min-h-screen overflow-hidden">
    @include('components.sidebar')

    <div class="flex-1 flex flex-col h-screen overflow-y-auto no-scrollbar">
        @include('components.navbar', [
            'section'   => 'Laporan',
            'pageTitle' => 'Riwayat Laporan',
        ])

        <main class="p-8 space-y-8">
            @php
            $laporan = [
                ['id'=>1,'tanaman'=>'Monstera Deliciosa','aksi'=>'Penyiraman','tanggal'=>'15 Okt 2024','waktu'=>'08:32 AM','ringkasan'=>'Penyiraman rutin dengan 500ml air filter. Daun terlihat segar dan bercahaya.','emoji'=>'🌿','kategori'=>'air','lokasi'=>'Living Room','kondisi'=>'Baik'],
                ['id'=>2,'tanaman'=>'Sansevieria Trifasciata','aksi'=>'Soil Aeration','tanggal'=>'14 Okt 2024','waktu'=>'10:15 AM','ringkasan'=>'Aerasi tanah rutin menggunakan tusuk kayu. Media tanam terasa agak padat.','emoji'=>'🌵','kategori'=>'tanah','lokasi'=>'Bedroom','kondisi'=>'Perlu Perhatian'],
                ['id'=>3,'tanaman'=>'Ficus Elastica','aksi'=>'Pemupukan','tanggal'=>'13 Okt 2024','waktu'=>'02:00 PM','ringkasan'=>'Aplikasi Nutrient Mix A dengan dosis 10ml. Pertumbuhan daun baru sangat baik.','emoji'=>'🌳','kategori'=>'pupuk','lokasi'=>'Balcony','kondisi'=>'Baik'],
                ['id'=>4,'tanaman'=>'Calathea Ornata','aksi'=>'Pengecekan Hama','tanggal'=>'12 Okt 2024','waktu'=>'09:45 AM','ringkasan'=>'Ditemukan bekas gigitan serangga. Telah diterapkan pestisida organik neem oil.','emoji'=>'🪴','kategori'=>'hama','lokasi'=>'Studio','kondisi'=>'Waspada'],
                ['id'=>5,'tanaman'=>'Pothos Aureum','aksi'=>'Repotting','tanggal'=>'10 Okt 2024','waktu'=>'11:20 AM','ringkasan'=>'Dipindahkan ke pot 22cm. Akar sudah padat. Menggunakan perlite & potting mix.','emoji'=>'🌱','kategori'=>'pot','lokasi'=>'Kitchen','kondisi'=>'Baik'],
                ['id'=>6,'tanaman'=>'ZZ Plant','aksi'=>'Penyiraman','tanggal'=>'09 Okt 2024','waktu'=>'03:30 PM','ringkasan'=>'Penyiraman setelah 10 hari. Tanah sangat kering. Tanaman sedikit layu.','emoji'=>'🌾','kategori'=>'air','lokasi'=>'Office','kondisi'=>'Perlu Perhatian'],
            ];

            $kondisiStyle = [
                'Baik' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                'Perlu Perhatian' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                'Waspada' => 'bg-red-500/10 text-red-400 border-red-500/20',
            ];

            $kategoriIcon = ['air'=>'💧','tanah'=>'🪨','pupuk'=>'🌱','hama'=>'🔍','pot'=>'🏺'];
            @endphp

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-serif text-white tracking-wide">Riwayat Laporan</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ count($laporan) }} laporan tercatat bulan ini</p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-[10px] font-bold text-white uppercase tracking-widest hover:bg-white/10 transition-all flex items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        Export PDF
                    </button>
                    <button class="px-4 py-2 bg-emerald-600 text-[#0B100D] rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-emerald-500 transition-all flex items-center gap-2">
                        <span class="text-lg leading-none">+</span>
                        Buat Laporan
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['label'=>'Total Laporan','val'=>count($laporan),'icon'=>'📝','sub'=>'Oktober 2024'],
                    ['label'=>'Kondisi Baik','val'=>'04','icon'=>'✅','sub'=>'67% dari total','accent'=>true],
                    ['label'=>'Waspada','val'=>'02','icon'=>'⚠️','sub'=>'Perlu perhatian'],
                    ['label'=>'Tanaman','val'=>'06','icon'=>'🌿','sub'=>'Dari 47 koleksi']
                ] as $s)
                <div class="p-6 rounded-3xl border border-white/5 {{ !empty($s['accent']) ? 'bg-emerald-500 text-[#0B100D]' : 'bg-[#121A16] text-white' }}">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-xs font-bold opacity-60 uppercase tracking-tighter">{{ $s['label'] }}</span>
                        <span>{{ $s['icon'] }}</span>
                    </div>
                    <div class="text-3xl font-bold">{{ $s['val'] }}</div>
                    <div class="text-[10px] opacity-60 mt-1 uppercase">{{ $s['sub'] }}</div>
                </div>
                @endforeach
            </div>

            <div class="flex flex-wrap gap-2 py-2">
                <button class="px-4 py-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-bold uppercase tracking-widest">Semua</button>
                @foreach(['Penyiraman','Pemupukan','Aerasi','Hama','Repotting'] as $f)
                <button class="px-4 py-2 bg-white/5 text-gray-500 border border-white/5 rounded-full text-[10px] font-bold uppercase tracking-widest hover:text-white hover:border-white/20 transition-all">{{ $f }}</button>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($laporan as $l)
                <div class="group bg-[#121A16] rounded-[2.5rem] border border-white/5 overflow-hidden hover:border-emerald-500/30 transition-all">
                    <div class="relative h-32 bg-[#1A231F] flex items-center justify-center text-5xl">
                        <span>{{ $l['emoji'] }}</span>
                        <div class="absolute bottom-3 left-4 flex items-center gap-2 px-3 py-1 bg-black/40 backdrop-blur-md rounded-full border border-white/10">
                            <span class="text-[10px]">{{ $kategoriIcon[$l['kategori']] }}</span>
                            <span class="text-[9px] font-bold text-white uppercase tracking-widest">{{ $l['kategori'] }}</span>
                        </div>
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[10px] text-gray-500 font-medium">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/></svg>
                                    {{ $l['tanggal'] }}
                                </div>
                                <h3 class="text-white font-bold leading-tight">{{ $l['aksi'] }}</h3>
                                <p class="text-xs text-emerald-500/80 italic">{{ $l['tanaman'] }}</p>
                            </div>
                            <span class="px-2 py-1 rounded-lg text-[8px] font-black uppercase border {{ $kondisiStyle[$l['kondisi']] ?? '' }}">
                                {{ $l['kondisi'] }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-400 leading-relaxed line-clamp-2 italic">"{{ $l['ringkasan'] }}"</p>

                        <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                            <span class="text-[10px] text-gray-500 font-bold uppercase tracking-tighter">📍 {{ $l['lokasi'] }}</span>
                            <div class="flex gap-2">
                                <button class="p-2 bg-white/5 rounded-lg hover:bg-white/10 text-white transition-all text-[10px] font-bold uppercase">Detail</button>
                                <button class="p-2 bg-white/5 rounded-lg hover:bg-white/10 text-white transition-all text-[10px] font-bold uppercase">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center items-center gap-2 mt-8">
                <button class="px-4 py-2 bg-white/5 border border-white/5 rounded-xl text-[10px] font-bold text-gray-400 hover:text-white transition-all uppercase tracking-widest">‹ Prev</button>
                @for($p=1;$p<=3;$p++)
                <button class="w-10 h-10 flex items-center justify-center rounded-xl text-[10px] font-bold {{ $p===1 ? 'bg-emerald-500 text-[#0B100D]' : 'bg-white/5 text-gray-400' }}">{{ $p }}</button>
                @endfor
                <button class="px-4 py-2 bg-white/5 border border-white/5 rounded-xl text-[10px] font-bold text-gray-400 hover:text-white transition-all uppercase tracking-widest">Next ›</button>
            </div>
        </main>
    </div>
</div>

</body>
</html>