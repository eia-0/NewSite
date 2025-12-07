@props(['type'])

@php
$textColor = match($type) {
    1 => 'text-blue-600',
    2 => 'text-green-600',
    3 => 'text-red-600',
    default => 'text-gray-800',
};
@endphp

<span class="{{ $attributes->get('class') }} {{ $textColor }}">
    {{ $slot }}
</span>