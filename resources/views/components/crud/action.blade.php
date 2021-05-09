@if (request()->url() !== $link)
    <a href="{{ $link }}">
        <i class="{{ $icon }}"></i>
    </a>
@endif
