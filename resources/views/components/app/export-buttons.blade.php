<a {!! $attributes->merge([
    'class' =>
        'inline-flex items-center px-2 py-1 mb-2 bg-gray-100 border border-gray-200 font-semibold uppercase tracking-widest hover:bg-gray-200 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 text-xs font-semibold text-gray-600',
    'href' => '',
]) !!}>
    {{ $slot }}
</a>
