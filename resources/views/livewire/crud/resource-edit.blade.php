<div class="crud crud-edit">
    <div class="crud-title">
        <h1 class="h3">Updating: {{ $resource->getItemName() }}</h1>
    </div>

    <div class="crud-form">
        @foreach ($resource->formFieldStack('edit') as $field)
            {{ $field->item($item)->render() }}
        @endforeach
    </div>
</div>
