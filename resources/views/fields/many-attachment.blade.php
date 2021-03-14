<div class="{{ $field->wrapperClass }}">
    <x-rambo::label :field="$field" />

    <div class="{{ $field->inputWrapperClass }}">
        <livewire:rambo-many-attachment-picker :field="$field" />

        <x-rambo::error :field="$field" />
    </div>
</div>
