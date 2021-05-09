<div class="crud crud-create">
    <div class="crud-title">
        <h1 class="h3">Creating {{ $resource->singularLabel() }}</h1>
    </div>

    <div class="crud-form">
        @foreach ($resource->formFieldStack('create') as $field)
            {{ $field->render() }}
        @endforeach
    </div>
</div>
