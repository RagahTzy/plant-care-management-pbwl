<header class="navbar">

    {{-- Left: Page Title --}}
    <div class="navbar-left">
        <span class="navbar-title">{{ $section ?? 'Maintenance Hub' }}</span>
        <span class="navbar-page-title">{{ $pageTitle ?? 'Dashboard' }}</span>
    </div>

    {{-- Right: Actions --}}
    <div class="navbar-right">

        {{-- Tab bar (optional, passed via slot) --}}
        @isset($tabs)
            <div class="tab-bar">
                {!! $tabs !!}
            </div>
        @endisset

        {{-- Search --}}
        <div class="navbar-search">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" placeholder="Cari tanaman...">
        </div>

        {{-- Notification Bell --}}
        <a href="#" class="nav-icon-btn">
            <span class="notif-dot"></span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
        </a>

        {{-- Avatar / Profile --}}
        <div class="avatar" title="Budi Santoso">BS</div>

    </div>

</header>