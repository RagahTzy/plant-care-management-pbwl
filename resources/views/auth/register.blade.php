@extends('layouts.auth')
@section('title', 'Register')

@section('auth')
<form method="POST" action="{{ route('register') }}" class="space-y-6">
    @csrf
    <div class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-[#dde9d6]">Nama</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-2 block w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none transition focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
            @error('name')<p class="mt-2 text-sm text-[#f8b803]">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-[#dde9d6]">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 block w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none transition focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
            @error('email')<p class="mt-2 text-sm text-[#f8b803]">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-[#dde9d6]">Password</label>
            <input id="password" name="password" type="password" required class="mt-2 block w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none transition focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
            @error('password')<p class="mt-2 text-sm text-[#f8b803]">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-[#dde9d6]">Konfirmasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-2 block w-full rounded-3xl border border-white/10 bg-[#0e2917] px-4 py-3 text-sm text-white outline-none transition focus:border-[#55c17f] focus:ring-2 focus:ring-[#55c17f]/20" />
        </div>
    </div>

    <button type="submit" class="w-full rounded-3xl bg-[#55c17f] px-5 py-3 text-sm font-semibold text-[#061a0d] transition hover:bg-[#7cd794]">Register</button>

    <div class="text-center text-sm text-[#b5d6b5]">
        Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-[#f8b803] hover:text-[#fff]">Login</a>
    </div>
</form>
@endsection
