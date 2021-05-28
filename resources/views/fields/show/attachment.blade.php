@if ($field->getShowValue())
    <a href="/admin/attachments/{{ optional($field->getShowValue())->id }}">
        <img src="{{ optional($field->getShowValue())->format('thumb') }}">
    </a>
@endif
