@props(['active'])

@php
$classes = ($active ?? false)
            ? 'border-b-2 border-gold-500 transition duration-150 ease-in-out'
            : 'border-b-2 border-transparent hover:text-gold-200 hover:border-gold-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
