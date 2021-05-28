@if ($field->resource)
    @if ($value = $field->getShowValue())
        <a href="{{ $field->resource->show($value) }}">
            {{ $field->getOptions()[$value] ?? '' }}
        </a>
    @endif
@else
    {{ $field->getShowValue() }}
@endif
