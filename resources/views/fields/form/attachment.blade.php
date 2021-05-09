<div class="crud-form-field">
    <div class="crud-form-field-label">
        <x-rambo::crud.form.label :field="$field" />
    </div>

    <div class="crud-form-field-input">
        <livewire:rambo-fields-attachment-picker
            :key="$field->getName()"
            :value="$field->getValue()"
            :name="$field->getName()"
        />

        <x-rambo::crud.form.error :field="$field" />
    </div>
</div>
