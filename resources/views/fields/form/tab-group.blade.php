@foreach ($field->getTabs() as $key => $label)
    <h1>{{ $label }}</h1>
@endforeach

@foreach ($field->getTabs() as $key => $label)
    @foreach ($field->getFields()[$key] as $_field)
        {!! $_field->item($item)->render() !!}
    @endforeach
@endforeach
