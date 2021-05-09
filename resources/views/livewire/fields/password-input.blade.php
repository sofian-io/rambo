<div class="w-100">
    <input
        type="{{ $fieldType }}"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        wire:model="value"
        @if ($readonly) disabled @endif
    >
</div>
