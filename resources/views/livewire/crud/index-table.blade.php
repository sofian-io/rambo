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

    @if ($resource->searchableFields())
        <div class="crud-index-search">
            <input
                type="text"
                wire:key="seach_{{ $resource->routebase() }}"
                wire:model.100ms="search"
                placeholder="Search for {{ $resource->label() }}"
            >
        </div>
    @endif

    <div wire:loading class="w-100">
        <x-rambo::loading />
    </div>

    @if ($items->isEmpty())
        <div class="crud-index-search">
            <p>No <strong>{{ $resource->label() }}</strong> found using the current filters.</p>
        </div>
    @endif

    @if ($items->isNotEmpty())
        <table wire:loading.remove class="crud-index-table">
            <thead>
                <tr>
                    @foreach ($resource->fieldStack('index') as $field)
                        <td>
                            @if ($field->sortable)
                                <span
                                    class="crud-index-table-content crud-index-table-sortable"
                                    wire:click="changeSort('{{ $field->getName() }}')"
                                >
                                    {{ $field->getLabel() }}

                                    @if ($sortCol === $field->getName())
                                        @if ($sortDir === 'desc')
                                            <i class="fas fa-sort-down"></i>
                                        @else
                                            <i class="fas fa-sort-up"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </span>
                            @else
                                <span class="crud-index-table-content">
                                    {{ $field->getLabel() }}
                                </span>
                            @endif
                        </td>
                    @endforeach
                    <td colspan="{{ count($resource->actions()) }}"></td>
                </tr>
            </thead>

            <tbody wire:key="index_{{ $resource->routebase() }}">
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
    @endif

    {{ $items->withQueryString()->links('rambo::components.crud.pagination') }}
</div>
