@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-pink-400 text-base font-medium text-pink-700 bg-pink-50 focus:outline-none focus:text-pink-800 focus:bg-pink-100 focus:border-pink-700 transition'
            : 'block pl-3 pr-4 py-2 border-transparent text-base font-medium text-white hover:text-pink-700 hover:border-l-4 hover:border-pink-400 hover:bg-white focus:outline-none focus:text-pink-700 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
