@if ($field->getShowValue())
    <iframe
        class="mx-2 mt-1"
        width="560" height="315"
        src="https://www.youtube.com/embed/{{ $field->getShowValue() }}"
        frameborder="0"
        allowfullscreen
    ></iframe>
@endif
