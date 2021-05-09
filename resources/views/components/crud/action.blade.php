@if (request()->url() !== $link)
    <a href="{{ $link }}">
        @if ($label)
            <span>{{ $label }}</span>
        @endif

        <i class="{{ $icon }}"></i>
    </a>
@endif
