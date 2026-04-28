<nav class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <span class="text-sm uppercase tracking-[0.36em] text-[#7fbf96]">Botanical Curator</span>
        <h2 class="text-xl font-semibold text-white">Dashboard</h2>
    </div>
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
        <div class="rounded-3xl bg-[#122a18] px-4 py-3 text-sm text-[#cad8c2]">Halo, {{ auth()->user()->name ?? 'Pengguna' }}</div>
        <div class="flex items-center gap-3">
            <a href="{{ route('profile') }}" class="inline-flex items-center rounded-full border border-white/10 bg-[#16321f] px-4 py-2 text-sm text-[#d7e5d4] transition hover:bg-[#1e3f2e]">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-full bg-[#55c17f] px-4 py-2 text-sm font-semibold text-[#061a0d] transition hover:bg-[#80d39d]">Logout</button>
            </form>
        </div>
    </div>
</nav>
