<label class="w-full p-4 border-b last:border-0" for="checkbox_{{ $item->id }}">
    <input
        type="checkbox"
        wire:click="addToSelections({{ $item->id }})"
        id="checkbox_{{ $item->id }}"
        class="mr-2 w-3 h-3"
        @if (in_array($item->id, $selections))
            checked="checked"
        @endif
    >

    {{ $item->name ?? $item->title ?? $item->working_title ?? $item->id }}
</label>
