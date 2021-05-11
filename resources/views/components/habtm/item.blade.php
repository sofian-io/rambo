<span
    class="habtm-picker-grid-panel-item"
    wire:click="toggleItem({{ $item->id }})"
>
    {{ $item->{$displayName} }}
</span>
