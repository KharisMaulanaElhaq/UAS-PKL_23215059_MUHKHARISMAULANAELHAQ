@props([
    'src',
    'alt' => '',
    'class' => 'img-fluid',
    'loading' => null,
    'width' => null,
    'height' => null,
])

@php
    $base = preg_replace('/\.(png|jpe?g|webp)$/i', '', $src);
    $webp = $base . '.webp';
    $fallback = $src;
@endphp

<picture>
    <source srcset="{{ asset($webp) }}" type="image/webp">
    <img src="{{ asset($fallback) }}"
        alt="{{ $alt }}"
        @if ($class) class="{{ $class }}" @endif
        @if ($loading) loading="{{ $loading }}" @endif
        @if ($width) width="{{ $width }}" @endif
        @if ($height) height="{{ $height }}" @endif
        {{ $attributes->except(['src', 'alt', 'class', 'loading', 'width', 'height']) }}>
</picture>
