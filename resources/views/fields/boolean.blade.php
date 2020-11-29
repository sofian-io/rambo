<div class="{{ $field->wrapperClass }}">
    <div class="w-1/4 px-2"></div>

    <div class="{{ $field->inputWrapperClass }}">
        <input
            class="{{ $field->inputClass }}"
            type="checkbox"
            id="{{ $field->getName() }}"
            name="{{ $field->getName() }}"
            placeholder="{{ $field->getLabel() }}"
            wire:model="fields.{{ $field->getName() }}"
            @if ($field->readonly || $field->disabled) disabled @endif
        >

        <x-rambo::label :field="$field" />

        <x-rambo::error :field="$field" />
    </div>
</div>
