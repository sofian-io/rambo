@if ($field->getValue())
    <a href="/admin/attachments/{{ optional($field->getValue())->id }}">
        <img src="{{ optional($field->getValue())->format('thumb') }}">
    </a>
@endif
