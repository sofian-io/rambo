<div class="crud-form-button">
    <div class="crud-form-button-input">
        <input
            class="button"
            type="submit"
            name="{{ $field->getName() }}"
            placeholder="{{ $field->getLabel() }}"
            wire:click="submit"
        >
    </div>
</div>
