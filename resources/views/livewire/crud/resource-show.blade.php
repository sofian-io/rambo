<div class="crud crud-show">
    <div class="crud-title">
        <h1 class="h3">{{ $resource->getItemName() }}</h1>

        <div class="crud-title-actions">
            <ul>
                @foreach ($resource->showActions() as $action)
                    <li>
                        {{ (new $action($resource, $currentUrl, $item))->render() }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <table class="crud-show-table">
        @foreach ($resource->fieldStack('show') as $field)
            <tr>
                @if (! $field->hideLabel)
                    <td class="crud-show-table-label">
                        <span>
                            {{ $field->getLabel() }}
                        </span>
                    </td>
                @endif

                <td
                    class="crud-show-table-value"
                    @if ($field->hideLabel) colspan="2" @endif
                >
                    <span class="crud-index-table-content">
                        {{ $field->item($item)->renderShow() }}
                    </span>
                </td>
            </tr>
        @endforeach
    </table>
</div>
