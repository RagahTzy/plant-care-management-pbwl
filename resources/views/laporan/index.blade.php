<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanaman Saya — Botanical Curator</title>
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
            'section'   => 'Koleksi',
            'pageTitle' => 'Tanaman Saya',
        ])

        <main class="p-8 space-y-8">
            @php
            $tanaman = [
                ['id'=>1,'nama'=>'Monstera Deliciosa','spesies'=>'Araceae','status'=>'sehat', 'emoji'=>'🌿','ruangan'=>'Living Room','jadwal'=>'3 hari','tinggi'=>'120 cm','terakhir'=>'2 hari lalu'],
                ['id'=>2,'nama'=>'Sansevieria Trifasciata','spesies'=>'Asparagaceae','status'=>'sehat','emoji'=>'🌵','ruangan'=>'Bedroom','jadwal'=>'7 hari','tinggi'=>'65 cm','terakhir'=>'5 hari lalu'],
                ['id'=>3,'nama'=>'Ficus Elastica','spesies'=>'Moraceae','status'=>'perlu-air','emoji'=>'🌳','ruangan'=>'Balcony','jadwal'=>'5 hari','tinggi'=>'90 cm','terakhir'=>'8 hari lalu'],
                ['id'=>4,'nama'=>'Calathea Ornata','spesies'=>'Marantaceae','status'=>'sakit', 'emoji'=>'🪴','ruangan'=>'Studio','jadwal'=>'2 hari','tinggi'=>'45 cm','terakhir'=>'1 hari lalu'],
                ['id'=>5,'nama'=>'Pothos Aureum','spesies'=>'Araceae','status'=>'sehat', 'emoji'=>'🌱','ruangan'=>'Kitchen','jadwal'=>'4 hari','tinggi'=>'55 cm','terakhir'=>'3 hari lalu'],
                ['id'=>6,'nama'=>'ZZ Plant','spesies'=>'Zamioculcas','status'=>'sehat', 'emoji'=>'🌾','ruangan'=>'Office','jadwal'=>'10 hari','tinggi'=>'70 cm','terakhir'=>'9 hari lalu'],
                ['id'=>7,'nama'=>'Peace Lily','spesies'=>'Spathiphyllum','status'=>'perlu-air','emoji'=>'💐','ruangan'=>'Bathroom','jadwal'=>'3 hari','tinggi'=>'50 cm','terakhir'=>'4 hari lalu'],
                ['id'=>8,'nama'=>'Rubber Plant','spesies'=>'Ficus elastica','status'=>'sehat', 'emoji'=>'🌴','ruangan'=>'Dining Room','jadwal'=>'6 hari','tinggi'=>'110 cm','terakhir'=>'1 hari lalu'],
            ];
            @endphp

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-serif text-white tracking-wide">Tanaman Saya</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ count($tanaman) }} tanaman dalam koleksi Anda</p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-xs font-bold hover:bg-white/10 transition-all flex items-center gap-2 uppercase tracking-widest text-white">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><circle cx="3" cy="6" r="1"/><circle cx="3" cy="12" r="1"/><circle cx="3" cy="18" r="1"/></svg>
                        List View
                    </button>
                    <a href="#" class="px-4 py-2 bg-emerald-600 text-[#0B100D] rounded-xl text-xs font-bold hover:bg-emerald-500 transition-all flex items-center gap-2 uppercase tracking-widest">
                        <span class="text-lg leading-none">+</span>
                        Tambah Tanaman
                    </a>
                </div>
            </div>

            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-full text-[10px] font-bold uppercase tracking-widest">Semua ({{ count($tanaman) }})</button>
                <button class="px-4 py-2 bg-white/5 text-gray-400 border border-white/5 rounded-full text-[10px] font-bold uppercase tracking-widest hover:border-emerald-500/50 hover:text-white transition-all text-white">✅ Sehat</button>
                <button class="px-4 py-2 bg-white/5 text-gray-400 border border-white/5 rounded-full text-[10px] font-bold uppercase tracking-widest hover:border-emerald-500/50 hover:text-white transition-all text-white">💧 Perlu Air</button>
                <button class="px-4 py-2 bg-white/5 text-gray-400 border border-white/5 rounded-full text-[10px] font-bold uppercase tracking-widest hover:border-emerald-500/50 hover:text-white transition-all text-white">🚨 Sakit</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                @foreach($tanaman as $t)
                <a href="#" class="group bg-[#121A16] rounded-[2.5rem] border border-white/5 p-2 transition-all hover:border-emerald-500/30">
                    <div class="relative h-48 rounded-[2rem] bg-[#1A231F] flex items-center justify-center text-6xl overflow-hidden shadow-inner">
                        <span class="group-hover:scale-110 transition-transform duration-500">{{ $t['emoji'] }}</span>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-tighter backdrop-blur-md 
                                {{ $t['status']==='sehat' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/20' : 
                                   ($t['status']==='perlu-air' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/20' : 
                                   'bg-red-500/20 text-red-400 border border-red-500/20') }}">
                                @if($t['status']==='sehat') ✓ Sehat
                                @elseif($t['status']==='perlu-air') 💧 Air
                                @else 🚨 Sakit @endif
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-5">
                        <h3 class="text-white font-semibold text-lg leading-tight">{{ $t['nama'] }}</h3>
                        <p class="text-xs text-emerald-500/60 font-medium italic mt-1">{{ $t['spesies'] }}</p>
                        
                        <div class="flex gap-4 mt-4">
                            <div class="flex flex-col">
                                <span class="text-[9px] text-gray-600 font-bold uppercase tracking-widest">Lokasi</span>
                                <span class="text-[11px] text-gray-300">{{ $t['ruangan'] }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[9px] text-gray-600 font-bold uppercase tracking-widest">Tinggi</span>
                                <span class="text-[11px] text-gray-300">{{ $t['tinggi'] }}</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-white/5 flex items-center justify-between">
                            <div class="flex items-center gap-2 text-blue-400/80">
                                <span class="text-xs">💧</span>
                                <span class="text-[10px] font-bold uppercase tracking-tighter">{{ $t['jadwal'] }}</span>
                            </div>
                            <span class="text-[10px] text-emerald-500 font-bold uppercase tracking-widest group-hover:mr-2 transition-all">Detail →</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </main>
    </div>
</div>

</body>
</html>