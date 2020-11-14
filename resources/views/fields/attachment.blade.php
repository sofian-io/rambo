<div class="{{ $field->wrapperClass }}">
    <x-rambo::label :field="$field" />

    <div class="{{ $field->inputWrapperClass }}">
        <livewire:rambo-attachment-picker :name="$field->getName()" />
        <x-rambo::error :field="$field" />
    </div>
</div>
