@if ($field->resource)
    @if ($value = $field->getViewValue())
        <a href="{{ $field->resource->show($value) }}">
            {{ $field->getOptions()[$value] ?? '' }}
        </a>
    @endif
@else
    {{ $field->getOptions()[$field->getViewValue()] ?? '' }}
@endif
