@if ($field->asHtml)
    {!! $field->getValue() !!}
@else
    {{ $field->getValue() }}
@endif
