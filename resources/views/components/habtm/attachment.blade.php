<div class="w-1/3 relative">
    <label class="block w-full p-4 border-b last:border-0" for="checkbox_{{ $item->id }}">
        <input
            type="checkbox"
            wire:model="selections.{{ $key }}"
            id="checkbox_{{ $item->id }}"
            class="absolute z-20 w-10 h-10 top-2 left-2"
        >
        <img
            class="
                relative z-10 w-full rounded-lg border border-grey-900
                @if (! in_array($item->id, $selections)) opacity-50 @endif
            "
            src="{{ $item->format('thumb') }}"
        >
    </label>
</div>
