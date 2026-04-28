<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tanaman — Botanical Curator</title>
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
            'section'   => 'Tanaman',
            'pageTitle' => 'Detail Tanaman',
        ])

        <main class="p-8 space-y-8">
            @php
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
                'jadwal'      => '3 hari',
                'cahaya'      => 'Indirect Bright',
                'suhu'        => '18–27°C',
                'kelembaban'  => '60–80%',
                'media_tanam' => 'Perlite + Potting Mix',
                'pupuk'       => 'Setiap 2 minggu',
                'deskripsi'   => 'Monstera Deliciosa, dikenal sebagai "Swiss Cheese Plant", adalah tanaman tropis ikonik. Daun berlubangnya yang unik merupakan adaptasi alami terhadap angin kencang di habitat aslinya di hutan hujan tropis Amerika Tengah.',
                'tips'        => [
                    'Siram ketika 2–3 inci lapisan atas tanah kering',
                    'Lap daun dengan kain lembab dari debu',
                    'Berikan penopang moss pole agar tegak',
                    'Hindari paparan sinar matahari langsung',
                ],
                'laporan' => [
                    ['tanggal'=>'14 Okt 2024', 'aksi'=>'Penyiraman',  'catatan'=>'Kondisi baik, daun segar'],
                    ['tanggal'=>'10 Okt 2024', 'aksi'=>'Pemupukan',   'catatan'=>'Nutrient Mix A diterapkan'],
                    ['tanggal'=>'02 Okt 2024', 'aksi'=>'Repotting',   'catatan'=>'Dipindahkan ke pot 30cm'],
                ],
            ];
            @endphp

            <nav class="flex items-center space-x-2 text-[10px] font-bold uppercase tracking-widest text-gray-500">
                <a href="#" class="hover:text-emerald-500 transition-colors">Dashboard</a>
                <span>/</span>
                <a href="#" class="hover:text-emerald-500 transition-colors">Tanaman</a>
                <span>/</span>
                <span class="text-emerald-500">{{ $tanaman['nama'] }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="relative aspect-square rounded-[3rem] bg-[#121A16] border border-white/5 flex items-center justify-center text-[10rem] shadow-2xl overflow-hidden group">
                        <span class="group-hover:scale-110 transition-transform duration-700">{{ $tanaman['emoji'] }}</span>
                        <div class="absolute top-8 right-8">
                            <span class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 backdrop-blur-md">
                                ✓ {{ $tanaman['status'] }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-8">
                    <div>
                        <h1 class="text-5xl font-serif text-white tracking-tight">{{ $tanaman['nama'] }}</h1>
                        <p class="text-emerald-500 font-medium mt-2 italic">{{ $tanaman['spesies'] }}</p>
                        <p class="text-gray-400 mt-6 leading-relaxed max-w-2xl italic">"{{ $tanaman['deskripsi'] }}"</p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach([
                            ['💧','Jadwal Air', $tanaman['jadwal']],
                            ['☀️','Cahaya', $tanaman['cahaya']],
                            ['🌡️','Suhu', $tanaman['suhu']],
                            ['💦','Lembab', $tanaman['kelembaban']],
                            ['📏','Tinggi', $tanaman['tinggi']],
                            ['🕐','Umur', $tanaman['umur']]
                        ] as $care)
                        <div class="bg-[#121A16] p-4 rounded-2xl border border-white/5">
                            <div class="flex items-center gap-3">
                                <span class="text-xl">{{ $care[0] }}</span>
                                <div>
                                    <p class="text-[9px] font-bold text-gray-500 uppercase tracking-widest">{{ $care[1] }}</p>
                                    <p class="text-xs font-semibold text-white">{{ $care[2] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="flex flex-wrap gap-3 pt-4">
                        <button class="px-6 py-3 bg-emerald-600 text-[#0B100D] rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-emerald-500 transition-all">Jadwal Perawatan</button>
                        <button class="px-6 py-3 bg-white/5 border border-white/10 text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-white/10 transition-all">Growth Tips</button>
                        <button class="px-6 py-3 bg-white/5 border border-white/10 text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-white/10 transition-all">Edit Data</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-[#121A16] p-8 rounded-[2.5rem] border border-white/5">
                        <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-6 flex items-center gap-2">
                            <span class="text-emerald-500 text-lg">✦</span> Tips Perawatan
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            @foreach($tanaman['tips'] as $tip)
                            <div class="flex gap-4 items-start p-4 bg-white/[0.02] rounded-2xl border border-white/5">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 mt-1.5 shrink-0"></div>
                                <p class="text-xs text-gray-400 leading-relaxed">{{ $tip }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-[#121A16] p-8 rounded-[2.5rem] border border-white/5">
                        <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-6">📝 Log Perawatan Terbaru</h3>
                        <div class="space-y-4">
                            @foreach($tanaman['laporan'] as $l)
                            <div class="flex items-center justify-between p-4 bg-white/[0.02] rounded-2xl border border-white/5 group hover:border-emerald-500/30 transition-all">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-emerald-500/10 flex items-center justify-center text-emerald-500 text-xs font-bold">
                                        {{ substr($l['aksi'], 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-white">{{ $l['aksi'] }}</p>
                                        <p class="text-[10px] text-gray-500">{{ $l['catatan'] }}</p>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-gray-600 uppercase">{{ $l['tanggal'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-[#121A16] p-8 rounded-[2.5rem] border border-white/5 space-y-6">
                        <h3 class="text-sm font-bold text-white uppercase tracking-widest">Kondisi Real-time</h3>
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between text-[10px] font-bold uppercase mb-2">
                                    <span class="text-gray-500">Kesehatan</span>
                                    <span class="text-emerald-500">87%</span>
                                </div>
                                <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-emerald-500 rounded-full" style="width: 87%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-[10px] font-bold uppercase mb-2">
                                    <span class="text-gray-500">Kelembaban Tanah</span>
                                    <span class="text-blue-400">62%</span>
                                </div>
                                <div class="h-1.5 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-400 rounded-full" style="width: 62%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#121A16] p-8 rounded-[2.5rem] border border-white/5">
                        <h3 class="text-sm font-bold text-white uppercase tracking-widest mb-6">📍 Lokasi</h3>
                        <div class="p-6 bg-emerald-500/5 rounded-3xl border border-emerald-500/10 text-center">
                            <div class="text-4xl mb-3">🏠</div>
                            <p class="text-lg font-serif text-white">{{ $tanaman['ruangan'] }}</p>
                            <p class="text-[10px] text-emerald-500/60 font-bold uppercase mt-1">Terakhir pindah: {{ $tanaman['terakhir'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>