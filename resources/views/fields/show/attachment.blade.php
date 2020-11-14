@if ($field->getValue())
    <a
        class="inline-block"
        href="{{ optional($field->getValue())->path() }}"
        target="_blank"
    >
        <img
            class="h-24 w-24"
            src="{{ optional($field->getValue())->format('thumb') }}"
        >
    </a>
@endif
