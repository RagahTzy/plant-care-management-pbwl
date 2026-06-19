<aside class="w-64 bg-botanical-800 border-r border-botanical-700 flex flex-col justify-between h-full">
    <div>
        <div class="p-6 flex items-center gap-3">
            <svg class="w-6 h-6 text-botanical-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                <h1 class="text-white font-medium text-lg tracking-wide">Plant Care Management System</h1>
                <p class="text-xs text-botanical-text/60">
                    {{ auth()->user()->role === 'admin' ? 'Admin Management' : 'Plant Lover' }}
                </p>
            </div>
        </div>

        <nav class="mt-4 px-4 space-y-1">
            {{-- MENU DASHBOARD (Dinamis) --}}
            <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('*.dashboard') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                <span>📊</span> Dashboard
            </a>

            {{-- MENU TANAMAN (Admin: Kelola, User: Lihat) --}}
            <a href="{{ route('tanaman.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('tanaman.*') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                <span>🌱</span> {{ auth()->user()->role === 'admin' ? 'Kelola Tanaman' : 'Tanaman Saya' }}
            </a>

            {{-- MENU LOKASI (Hanya Admin) --}}
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.lokasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.lokasi.*') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                    <span>📍</span> Manajemen Lokasi
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                    <span>👥</span> Manajemen User
                </a>
            @endif

            {{-- MENU JADWAL (Admin: Kelola, User: Lihat/Selesai) --}}
            <a href="{{ route('jadwal.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('jadwal.*') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                <span>📅</span> Jadwal Perawatan
            </a>

            {{-- MENU TIPS (Admin: Kelola, User: Lihat) --}}
            <a href="{{ route('tips.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('tips.*') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                <span>💡</span> Tips Perawatan
            </a>

            {{-- MENU LAPORAN (Pemisahan Fitur) --}}
            <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('laporan.*') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                <span>📈</span> {{ auth()->user()->role === 'admin' ? 'Laporan Pertumbuhan' : 'Riwayat Laporan' }}
            </a>

            @if(auth()->user()->role === 'user')
                <a href="{{ route('user.laporan.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg {{ request()->routeIs('user.laporan.create') ? 'bg-botanical-700 text-white' : 'text-gray-400 hover:text-white' }}">
                    <span>📸</span> Kirim Laporan
                </a>
            @endif
        </nav>
    </div>

    <div class="p-4 space-y-1 border-t border-botanical-700">
        <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg text-gray-400 hover:text-white transition">
            <span>⚙️</span> Profil Saya
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg text-red-400 hover:bg-red-500/10 transition">
                <span>🚪</span> Logout
            </button>
        </form>
    </div>
</aside>