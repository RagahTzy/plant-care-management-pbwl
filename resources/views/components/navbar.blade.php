<header class="flex items-center justify-between px-6 py-4 bg-[#0B100D] border-b border-white/10 sticky top-0 z-50">
    <div class="flex flex-col">
        <span class="text-[10px] font-bold tracking-[0.2em] text-emerald-500 uppercase">
            {{ $section ?? 'DAFTAR TANAMAN' }}
        </span>
        <h1 class="text-2xl font-serif text-white tracking-wide leading-tight">
            {{ $pageTitle ?? 'My Moonlit Conservatory' }}
        </h1>
    </div>

    <div class="flex items-center space-x-6">
        <div class="relative hidden md:block">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </span>
            <input type="text" 
                   class="bg-[#1A231F] text-sm text-gray-300 pl-10 pr-4 py-2 rounded-lg border border-white/5 focus:outline-none focus:border-emerald-500 w-64 transition-all" 
                   placeholder="Cari tanaman...">
        </div>

        <button class="hidden lg:flex items-center space-x-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-4 py-2 rounded-lg hover:bg-emerald-600 hover:text-white transition-all text-sm font-medium">
            <span class="text-lg leading-none">+</span>
            <span>Tambah</span>
        </button>

        <a href="#" class="relative p-2 text-gray-400 hover:text-white transition-colors">
            <span class="absolute top-2 right-2.5 w-2 h-2 bg-yellow-500 rounded-full border-2 border-[#0B100D]"></span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
        </a>

        <div class="flex items-center space-x-3 border-l border-white/10 pl-6">
            <div class="w-9 h-9 rounded-full bg-emerald-900 border border-emerald-500/50 flex items-center justify-center text-emerald-400 font-bold text-xs shadow-lg overflow-hidden">
                @if(isset($userAvatar))
                    <img src="{{ $userAvatar }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    BS
                @endif
            </div>
        </div>
    </div>
</header>