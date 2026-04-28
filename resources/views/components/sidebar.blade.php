<div class="space-y-10">
    <div class="space-y-3">
        <p class="text-xs uppercase tracking-[0.28em] text-[#6ebf91]">Navigasi</p>
        <div class="space-y-2">
            @php
                $navItems = [
                    ['label' => 'Dashboard', 'route' => 'dashboard.user'],
                    ['label' => 'Tanaman', 'route' => 'tanaman.index'],
                    ['label' => 'Jadwal', 'route' => 'jadwal.index'],
                    ['label' => 'Tips', 'route' => 'tips.index'],
                    ['label' => 'Laporan', 'route' => 'laporan.index'],
                ];
            @endphp
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" class="block rounded-3xl border border-white/10 bg-[#122c1f] px-4 py-3 text-sm text-[#d7e5d4] transition hover:bg-[#1f462e]">{{ $item['label'] }}</a>
            @endforeach
        </div>
    </div>

    @if (Route::has('user.index'))
        <div class="space-y-3">
            <p class="text-xs uppercase tracking-[0.28em] text-[#6ebf91]">Admin</p>
            <a href="{{ route('user.index') }}" class="block rounded-3xl border border-white/10 bg-[#122c1f] px-4 py-3 text-sm text-[#d7e5d4] transition hover:bg-[#1f462e]">User Management</a>
        </div>
    @endif
</div>
