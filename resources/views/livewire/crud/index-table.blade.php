<div class="crud crud-index">
    <div class="crud-title">
        <h1 class="h3">{{ $resource->label() }}</h1>

        <div class="crud-title-buttons">
            <ul>
                @foreach ($resource->indexActions() as $action)
                    <li>
                        {{ (new $action($resource))->render() }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <table class="crud-index-table">
        <thead>
            <tr>
                @foreach ($resource->fieldStack('index') as $field)
                    <td>
                        <span class="crud-index-table-content">
                            {{ $field->getLabel() }}
                        </span>
                    </td>
                @endforeach
                <td colspan="{{ count($resource->actions()) }}"></td>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    @foreach ($resource->fieldStack('index') as $field)
                        <td>
                            <span class="crud-index-table-content">
                                {{ $field->item($item)->renderShow() }}
                            </span>
                        </td>
                    @endforeach

                    @foreach ($resource->actions() as $action)
                        <td class="crud-index-table-action">
                            {{ (new $action($resource, $item))->render() }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->withQueryString()->links('rambo::components.crud.pagination') }}
</div>
