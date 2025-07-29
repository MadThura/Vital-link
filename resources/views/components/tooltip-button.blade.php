@props(['peerClass', 'tooltipText', 'icon', 'hoverColor', 'route'])

<div class="relative">
    <button
        {{ $attributes->merge([
            'class' => "p-1.5 rounded-md text-gray-400 hover:text-{$hoverColor} hover:bg-gray-700 transition-colors peer/{$peerClass}",
        ]) }}>
        <a href="{{ $route }}"><i class="fa-solid {{ $icon }} text-sm"></i></a>
    </button>
    <span
        class="absolute -bottom-8 left-1/2 -translate-x-1/2 bg-gray-700 text-gray-200 text-xs px-2 py-1 rounded whitespace-nowrap opacity-0 pointer-events-none transition-opacity peer-hover/{{ $peerClass }}:opacity-100">
        {{ $tooltipText }}
    </span>
</div>
