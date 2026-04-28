@props(['title' => null, 'subtitle' => null, 'class' => ''])
<div {{ $attributes->merge(['class' => 'rounded-[28px] border border-white/10 bg-[#122d1f] p-6 shadow-[0_30px_50px_rgba(0,0,0,0.25)] ' . $class]) }}>
    @if ($title)
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
            @if ($subtitle)
                <p class="text-sm text-[#b8d3ba]">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    {{ $slot }}
</div>
