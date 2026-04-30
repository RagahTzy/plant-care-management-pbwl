@props(['type' => 'info'])
@php
    $colors = [
        'info' => 'bg-[#16321f] border-[#55c17f] text-[#d7e5d4]',
        'success' => 'bg-[#152f18] border-[#80d39d] text-[#c7e7cc]',
        'warning' => 'bg-[#3e3f10] border-[#f8b803] text-[#f8f3c0]',
        'danger' => 'bg-[#351818] border-[#f53003] text-[#f7c6c3]',
    ];
@endphp
<div {{ $attributes->merge(['class' => 'rounded-3xl border px-4 py-3 text-sm ' . ($colors[$type] ?? $colors['info'])]) }}>
    {{ $slot }}
</div>
