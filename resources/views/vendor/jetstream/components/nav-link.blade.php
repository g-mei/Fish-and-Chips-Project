@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-pink-400 text-sm font-medium leading-5 text-secondary focus:outline-none focus:border-pink-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 text-white hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
