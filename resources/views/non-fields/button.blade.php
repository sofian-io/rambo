<div class="{{ $field->wrapperClass }}">
    <input
        class="{{ $field->inputClass }}"
        type="submit"
        name="{{ $field->getName() }}"
        placeholder="{{ $field->getLabel() }}"
        wire:click="submit"
    >
</div>
