@if ($field->getValue())
    <a
        class="inline-block"
        href="/admin/attachments/{{ optional($field->getValue())->id }}"
    >
        <img
            class="h-24 w-24"
            src="{{ optional($field->getValue())->format('thumb') }}"
        >
    </a>
@endif
