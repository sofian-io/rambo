@if ($field->getViewValue())
    <a href="/admin/attachments/{{ optional($field->getViewValue())->id }}">
        <img src="{{ optional($field->getViewValue())->format('thumb') }}">
    </a>
@endif
