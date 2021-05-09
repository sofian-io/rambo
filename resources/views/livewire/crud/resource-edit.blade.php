<div class="crud crud-edit">
    <div class="crud-title">
        <h1 class="h3">Updating: {{ $resource->getItemName() }}</h1>

        <div class="crud-title-buttons">
            <ul>
                @foreach ($resource->editActions() as $action)
                    <li>
                        {{ (new $action($resource, $currentUrl))->render() }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="crud-form">
        @foreach ($resource->formFieldStack('edit') as $field)
            {{ $field->item($item)->render() }}
        @endforeach
    </div>
</div>
