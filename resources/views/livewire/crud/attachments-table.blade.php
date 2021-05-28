<div class="crud crud-index">
    <div class="crud-title">
        <h1 class="h3">{{ $resource->getLabel() }}</h1>
    </div>

    @if ($resource->searchableFields())
        <div class="crud-index-search">
            <x-rambo::crud.index.search
                :items="$items"
                :resource="$resource"
            />
        </div>
    @endif

    <div>
        @if ($items->isEmpty())
            <div class="crud-index-search">
                <p>No <strong>{{ $resource->getLabel() }}</strong> found using the current filters.</p>
            </div>
        @endif

        @if ($items->isNotEmpty())
            @include($resource->indexTableView())
        @endif

        @if ($items->hasPages())
            <div class="pagination">
                {{ $items->withQueryString()->links('rambo::components.crud.index.pagination') }}
            </div>
        @endif
    </div>
</div>
