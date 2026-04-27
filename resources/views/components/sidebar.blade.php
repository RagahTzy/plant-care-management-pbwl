<aside class="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-name">🌿 Botanical Curator</div>
        <div class="brand-sub">Plant Care System</div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">

        <span class="nav-label">Main Menu</span>

        <a href="{{ route('dashboard') }}"
           class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('tanaman.index') }}"
           class="nav-item {{ request()->routeIs('tanaman.*') ? 'active' : '' }}">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 22V12M12 12C12 12 7 10 4 6c3 0 6 1 8 6zM12 12c0 0 5-2 8-6-3 0-6 1-8 6z"/>
                <path d="M5 22h14"/>
            </svg>
            Tanaman Saya
        </a>

        <a href="#"
           class="nav-item {{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            Jadwal Perawatan
            <span class="nav-badge">4</span>
        </a>

        <a href="#"
           class="nav-item {{ request()->routeIs('tips.*') ? 'active' : '' }}">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            Growth Tips
        </a>

        <a href="{{ route('laporan.index') }}"
           class="nav-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/>
                <line x1="16" y1="17" x2="8" y2="17"/>
                <polyline points="10 9 9 9 8 9"/>
            </svg>
            Riwayat Laporan
        </a>

        <span class="nav-label" style="margin-top:8px;">Pengaturan</span>

        <a href="#" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.07 4.93A10 10 0 0 0 4.93 19.07M19.07 19.07A10 10 0 0 0 4.93 4.93"/>
                <path d="M12 2v2M12 20v2M2 12h2M20 12h2"/>
            </svg>
            Pengaturan
        </a>

    </nav>

    {{-- Upgrade CTA --}}
    <div class="sidebar-upgrade">
        <h4>Upgrade ke Pro</h4>
        <p>Dapatkan analisis tanah berbasis AI dan integrasi cuaca real-time.</p>
        <a href="#" class="btn-upgrade">✦ Jelajahi Paket</a>
    </div>

</aside>