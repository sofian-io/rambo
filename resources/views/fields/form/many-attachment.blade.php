<div class="crud-form-field">
    <div class="crud-form-field-label">
        <x-rambo::crud.form.label :field="$field" />
    </div>

    <div class="crud-form-field-input w-80">
        <livewire:rambo-fields-many-attachment-picker
            :key="$field->getName()"
            :field="$field"
        />

        <x-rambo::crud.form.error :field="$field" />
    </div>
</div>
