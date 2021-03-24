<a
    wire:click.prevent="handleAction({{ $action->key }})"
    class="rambo-button mr-2"
>
    @if ($action->icon)
        <i class="mr-2 {{ $action->icon }}" aria-hidden="true"></i>
    @endif

    {{ $action->label }}
</a>
