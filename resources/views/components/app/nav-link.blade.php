@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block text-slate-200 hover:text-white truncate transition duration-150'
            : 'inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800
dark:hover:text-gray-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
