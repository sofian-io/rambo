<div class="{{ $field->wrapperClass }}">
    <x-rambo::label :field="$field" />

    <div class="{{ $field->inputWrapperClass }}">
        <livewire:rambo-youtube-field :key="$field->uniqid" :field="$field" />
        <x-rambo::error :field="$field" />
    </div>
</div>
