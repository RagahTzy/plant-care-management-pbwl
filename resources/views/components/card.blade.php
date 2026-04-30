<div class="bg-card rounded-2xl p-6 shadow-lg relative overflow-hidden">
    
    <div class="flex justify-between items-start">
        <div>
            <p class="text-sm text-gray-400">{{ $title }}</p>
            <h2 class="text-3xl font-semibold mt-2">{{ $value }}</h2>
        </div>

        @if(isset($badge))
        <span class="text-xs px-3 py-1 rounded-full bg-secondary text-green-200">
            {{ $badge }}
        </span>
        @endif
    </div>

    @if(isset($sub))
    <p class="text-xs text-gray-400 mt-3">{{ $sub }}</p>
    @endif

</div>