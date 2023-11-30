@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-black text-left text-base font-medium text-black bg-indigo-50 focus:outline-none focus:text-maroon focus:bg-indigo-100 focus:border-maroon transition duration-150 ease-in-out'
    : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-maroon hover:bg-gray-50 hover:border-maroon focus:outline-none focus:text-maroon focus:bg-gray-50 focus:border-maroon transition duration-150 ease-in-out';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
