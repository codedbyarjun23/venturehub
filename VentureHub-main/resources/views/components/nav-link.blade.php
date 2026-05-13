@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link-base nav-indicator nav-link-active text-white'
            : 'nav-link-base nav-indicator text-gray-400 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
