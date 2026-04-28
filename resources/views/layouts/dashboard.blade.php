@extends('layouts.app')

@section('content')
<div class="min-h-screen lg:flex">
    <aside class="hidden lg:block lg:w-72 xl:w-80 bg-[#0d1f11] border-r border-white/10 shadow-[8px_0_80px_rgba(0,0,0,0.45)]">
        <div class="h-full overflow-y-auto py-8 px-6">
            @include('components.sidebar')
        </div>
    </aside>

    <main class="flex-1 bg-[#08140c]">
        <div class="border-b border-white/10 bg-[#0d1f11]/70 backdrop-blur-xl px-4 py-4 sm:px-6 lg:px-8">
            @include('components.navbar')
        </div>
        <div class="px-4 py-6 sm:px-6 lg:px-10 xl:px-12">
            @yield('dashboard')
        </div>
    </main>
</div>
@endsection
