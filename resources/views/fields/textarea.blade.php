<div class="{{ $field->wrapperClass }}">
    <x-rambo::label :field="$field" />

    <div class="{{ $field->inputWrapperClass }}">
        <textarea
            class="{{ $field->inputClass }}"
            id="{{ $field->getName() }}"
            name="{{ $field->getName() }}"
            placeholder="{{ $field->getLabel() }}"
            wire:model="fields.{{ $field->getName() }}"
        ></textarea>

        <x-rambo::error :field="$field" />
    </div>
</div>
