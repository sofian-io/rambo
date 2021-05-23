<div class="crud crud-index">
    <div class="crud-title">
        <h1 class="h3">{{ $resource->getLabel() }}</h1>

        <div class="crud-title-actions">
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
            <x-rambo::crud.index.search
                :items="$items"
                :resource="$resource"
            />

            <div wire:click="toggleFilterModal" class="button">
                @if (isset($enabledFilters) && $enabledFilters > 0)
                    {{ $enabledFilters }}
                @endif
                <i class="fas fa-filter"></i>
            </div>
        </div>
    @endif

    <div wire:loading.delay class="w-100">
        <x-rambo::loading />
    </div>

    <div wire:loading.delay.remove>
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

    @if ($filterModal)
        <x-rambo::modals.index-filters-modal
            :resource="$resource"
            :filters="$filters"
        />
    @endif
</div>
