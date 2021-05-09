<div class="crud crud-create">
    <div class="crud-title">
        <h1 class="h3">Creating {{ $resource->singularLabel() }}</h1>

        <div class="crud-title-actions">
            <ul>
                @foreach ($resource->createActions() as $action)
                    <li>
                        {{ (new $action($resource, $currentUrl))->render() }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="crud-form">
        @foreach ($resource->formFieldStack('create') as $field)
            {{ $field->render() }}
        @endforeach
    </div>
</div>
