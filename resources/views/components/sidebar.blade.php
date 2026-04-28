<aside class="w-72 h-screen bg-[#0B100D] border-r border-white/10 flex flex-col sticky top-0">
    <div class="px-8 py-10">
        <div class="flex items-center space-x-2">
            <span class="text-2xl">🌿</span>
            <span class="text-white font-serif text-xl tracking-wide">Botanical Curator</span>
        </div>
        <p class="text-emerald-500/60 text-[10px] font-bold tracking-[0.2em] mt-1 ml-9 uppercase">Plant Care System</p>
    </div>

    <nav class="flex-1 px-4 space-y-1">
        <span class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] mb-4 block">Navigation</span>

        <a href="{{ route('dashboard') }}"
           class="flex items-center px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('dashboard') ? 'bg-emerald-500/10 text-emerald-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-emerald-400' : 'text-gray-500 group-hover:text-white' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                <rect x="14" y="14" width="7" height="7" rx="1.5"/>
            </svg>
            <span class="text-sm font-medium">Dashboard</span>
        </a>

        <a href="{{ route('tanaman.index') }}"
           class="flex items-center px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('tanaman.*') ? 'bg-emerald-500/10 text-emerald-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 22V12M12 12C12 12 7 10 4 6c3 0 6 1 8 6zM12 12c0 0 5-2 8-6-3 0-6 1-8 6zM5 22h14"/>
            </svg>
            <span class="text-sm font-medium text-inherit">My Plants</span>
        </a>

        <a href="#" class="flex items-center justify-between px-4 py-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition-all group">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
                <span class="text-sm font-medium">Schedule</span>
            </div>
            <span class="bg-emerald-500 text-[#0B100D] text-[10px] font-bold px-1.5 py-0.5 rounded-md">4</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition-all group">
            <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>
            </svg>
            <span class="text-sm font-medium">Care Tips</span>
        </a>

        <div class="pt-6">
            <span class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] mb-4 block">Collections</span>
            <div class="px-4 space-y-4">
                <div class="flex items-center text-xs text-gray-400 hover:text-white cursor-pointer transition-colors">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 mr-3"></span> Indoor Garden
                </div>
                <div class="flex items-center text-xs text-gray-400 hover:text-white cursor-pointer transition-colors">
                    <span class="w-2 h-2 rounded-full bg-yellow-500 mr-3"></span> Succulents
                </div>
                <div class="flex items-center text-xs text-gray-400 hover:text-white cursor-pointer transition-colors">
                    <span class="w-2 h-2 rounded-full bg-blue-500 mr-3"></span> Tropicals
                </div>
            </div>
        </div>
    </nav>

    <div class="p-4 mx-4 mb-8 bg-gradient-to-br from-[#1A231F] to-[#0B100D] border border-white/5 rounded-2xl">
        <h4 class="text-xs font-bold text-white mb-1 uppercase tracking-wider">Curator Pro</h4>
        <p class="text-[10px] text-gray-400 mb-3 leading-relaxed">Unlock advanced soil analysis and species tracking.</p>
        <a href="#" class="block w-full py-2 bg-emerald-500/20 hover:bg-emerald-500 text-emerald-400 hover:text-[#0B100D] text-center text-[10px] font-bold rounded-lg transition-all border border-emerald-500/30 uppercase tracking-widest">Upgrade</a>
    </div>
</aside>