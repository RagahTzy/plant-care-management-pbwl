@extends('layouts.dashboard')

@section('title', 'Profile')

@section('dashboard')
<div class="max-w-3xl">
    <x-components.card title="Profile" subtitle="Update informasi akun">
        <form class="space-y-6">
            <div>
                <label class="block text-sm text-[#b8d3ba]">Nama</label>
                <input type="text" value="Putri" class="mt-2 w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
            </div>
            <div>
                <label class="block text-sm text-[#b8d3ba]">Email</label>
                <input type="email" value="putri@example.com" class="mt-2 w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
            </div>
            <div>
                <label class="block text-sm text-[#b8d3ba]">Password Baru</label>
                <input type="password" class="mt-2 w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
            </div>
            <button type="submit" class="rounded-full bg-[#55c17f] px-6 py-3 text-sm font-semibold text-[#061a0d] hover:bg-[#7cd794]">Update Profile</button>
        </form>
    </x-components.card>
</div>
@endsection
