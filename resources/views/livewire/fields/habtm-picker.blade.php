<div class="habtm-picker">
    @if ($value->isNotEmpty())
        <ul class="habtm-picker-list">
            @foreach ($value as $item)
                <li>{{ $item->{$displayName} }}</li>
            @endforeach
        </ul>
    @else
        <p>Nothing selected</p>
    @endif

    <a wire:click.prevent="openModal" class="button">
        Add/Remove {{ $resource }}
    </a>

    @if ($selecting)
        <x-rambo::modals.habtm-select-modal
            :search="$search"
            :resource="$resource"
            :unselectedItems="$unselectedItems"
            :selectedItems="$selectedItems"
            :itemComponent="$itemComponent"
        />
    @endif
</div>
