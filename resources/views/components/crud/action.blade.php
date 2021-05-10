@if ($currentUrl !== $link)
    <a href="{{ $link }}">
        @if ($label)<span>{{ $label }}</span>@endif
        @svg($icon)
    </a>
@endif
