<a
    href="{{ $link }}"
    class="{{ $class ?? '' }} rambo-button"
>
    @if ($text === 'Overview')
        <i class="mr-2 fas fa-table"></i>
    @elseif ($text === 'Back')
        <i class="mr-2 fas fa-chevron-left"></i>
    @elseif ($text === 'Delete')
        <i class="mr-2 fas fa-trash-alt"></i>
    @elseif ($text === 'Edit')
        <i class="mr-2 fas fa-edit"></i>
    @elseif ($text === 'View')
        <i class="mr-2 fas fa-eye"></i>
    @elseif ($text === 'Create' || $text === 'Add')
        <i class="mr-2 fa fa-plus"></i>
    @elseif ($icon ?? null)
        <i class="mr-2 {{ $icon }}"></i>
    @endif

    {{ $text }}
</a>
