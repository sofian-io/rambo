<div class="w-100 flex">
    <input
        type="{{ $fieldType }}"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        wire:model="value"
        @if ($readonly) disabled @endif
    >

    <div class="crud-form-field-input-icons">
        @if ($fieldType === 'password')
            <i
                wire:click="changeFieldType('text')"
                class="fas fa-eye"></i
            >
        @else
            <i
                wire:click="changeFieldType('password')"
                class="fas fa-eye-slash"
            ></i>
        @endif
    </div>
</div>
