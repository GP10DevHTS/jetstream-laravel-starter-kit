<a {!! $attributes->merge([
    'class' =>
        'inline-flex items-center px-1 py-1 mb-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:shadow-outline-indigo disabled:opacity-25 transition ease-in-out duration-150',
    'href' => '',
]) !!}>
    {{ $slot }}
</a>
