<a
    href="{{ $link }}"
    @if ($livewireAction)
        wire:click.prevent="{{ $livewireAction }}"
    @endif
>
    @if ($label)<span>{{ $label }}</span>@endif
    <i class="{{ $icon }}"></i>
</a>
