<div class="crud crud-index">
    <div class="crud-title">
        <h1 class="h3">{{ $resource->label() }}</h1>

        <div class="crud-title-buttons">
            <ul>
                @foreach ($resource->indexActions() as $action)
                    <li>
                        {{ (new $action($resource, $currentUrl))->render() }}
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

    <div wire:loading.remove>
        @if ($items->isEmpty())
            <div class="crud-index-search">
                <p>No <strong>{{ $resource->label() }}</strong> found using the current filters.</p>
            </div>
        @endif

        @if ($items->isNotEmpty())
            @include($resource->indexTableView())
        @endif

        {{ $items->withQueryString()->links('rambo::components.crud.pagination') }}
    </div>
</div>
