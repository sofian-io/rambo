<div class="{{ $field->wrapperClass }}">
    <x-rambo::label :field="$field" />

    <div class="{{ $field->inputWrapperClass }}">
        <select
            class="{{ $field->inputClass }}"
            id="{{ $field->getName() }}"
            name="{{ $field->getName() }}"
            wire:model="fields.{{ $field->getName() }}"
            @if ($field->readonly || $field->disabled) disabled @endif
        >
            <option value="">-- Nothing selected --</option>
            @foreach ($field->options as $key => $value)
                <option value="{{ $key }}">
                    {{ $value }}
                </option>
            @endforeach
        </select>

        <x-rambo::error :field="$field" />
    </div>
</div>
