<header class="flex items-center justify-between px-6 py-4 bg-[#0B100D] border-b border-white/10 sticky top-0 z-50">
    <div class="flex flex-col">
        <span class="text-[10px] font-bold tracking-[0.2em] text-emerald-500 uppercase">
            {{ $section ?? (auth()->user()->role === 'admin' ? 'ADMIN PANEL' : 'USER DASHBOARD') }}
        </span>
        <h1 class="text-2xl font-serif text-white tracking-wide leading-tight">
            {{ $pageTitle ?? 'Botanical Curator' }}
        </h1>
    </div>

    <div class="flex items-center space-x-6">
        <div class="relative hidden md:block">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </span>
            <input type="text" class="bg-[#1A231F] text-sm text-gray-300 pl-10 pr-4 py-2 rounded-lg border border-white/5 focus:outline-none focus:border-emerald-500 w-64 transition-all" placeholder="Cari...">
        </div>

        @if(isset($addRoute))
        <a href="{{ route($addRoute) }}" class="hidden lg:flex items-center space-x-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-4 py-2 rounded-lg hover:bg-emerald-600 hover:text-white transition-all text-sm font-medium">
            <span class="text-lg leading-none">+</span>
            <span>Tambah</span>
        </a>
        @endif

        <div class="flex items-center space-x-3 border-l border-white/10 pl-6">
            <div class="text-right hidden sm:block">
                <p class="text-xs text-white font-medium">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-gray-500 uppercase">{{ auth()->user()->role }}</p>
            </div>
            <div class="w-9 h-9 rounded-full bg-emerald-900 border border-emerald-500/50 flex items-center justify-center text-emerald-400 font-bold text-xs">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
        </div>
    </div>
</header>