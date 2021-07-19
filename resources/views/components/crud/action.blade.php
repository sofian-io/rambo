<a
    @if (isset($link))
        href="{{ $link }}"
    @else
        href="#"
    @endif

    @isset ($livewireAction)
        wire:click.prevent="{{ $livewireAction }}"
    @endisset

    @isset ($parseAction)
        wire:click.prevent="parseAction('{{
            str_replace('\\', '\\\\', $parseAction)
        }}',{{
            $item->id
        }},'{{
            str_replace('\\', '\\\\', get_class($resource))
        }}')"
    @endisset
>
    @if ($label)<span>{{ $label }}</span>@endif
    <i class="{{ $icon }}"></i>
</a>
