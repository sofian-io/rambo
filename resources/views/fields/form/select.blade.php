<div class="crud-form-field">
    <div class="crud-form-field-label">
        <x-rambo::crud.form.label :field="$field" />
    </div>

    <div class="crud-form-field-input">
        <select
            id="{{ $field->getName() }}"
            name="{{ $field->getName() }}"
            placeholder="{{ $field->getLabel() }}"
            wire:model="{{ $field->getBindingName() }}"
        >
            @if (! optional($field)->notNullable)
                <option value="">-</option>
            @endif

            @foreach ($field->getOptions() as $key => $value)
                <option value="{{ $key }}">
                    {{ $value }}
                </option>
            @endforeach
        </select>

        <x-rambo::crud.form.error :field="$field" />
    </div>
</div>
