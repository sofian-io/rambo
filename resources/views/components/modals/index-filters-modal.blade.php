<div class="modal">
    <div class="modal-card no-padding">
        <div class="modal-card-title">
            <h4>Toggle filters</h4>
        </div>

        <div class="modal-card-content-fixed no-padding">
            @foreach($resource->getFilters() as $filter)
                <div class="modal-card-content-header">
                    <input
                        type="checkbox"
                        id="filters.{{ $filter->getLivewireKey() }}.enabled"
                        wire:model="filters.{{ $filter->getLivewireKey() }}.enabled"
                    >

                    <label for="filters.{{ $filter->getLivewireKey() }}.enabled">
                        {{ $filter->getName() }}
                    </label>
                </div>
                @if ($filters[$filter->getLivewireKey()]['enabled'] ?? false)
                    @foreach($filter->fields() as $field)
                        {{
                            $field
                                ->bindingName("filters.{$filter->getLivewireKey()}.fields")
                                ->render()
                        }}
                    @endforeach
                @endif
            @endforeach
        </div>

        <div class="modal-card-footer">
            <a wire:click.prevent="toggleFilterModal" class="button-link">
                Save and close
            </a>
        </div>
    </div>
</div>
