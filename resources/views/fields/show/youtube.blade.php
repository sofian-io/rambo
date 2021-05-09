@if ($field->getViewValue())
    <iframe
        class="mx-2 mt-1"
        width="560" height="315"
        src="https://www.youtube.com/embed/{{ $field->getViewValue() }}"
        frameborder="0"
        allowfullscreen
    ></iframe>
@endif
