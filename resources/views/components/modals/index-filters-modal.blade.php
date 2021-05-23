<div class="modal">
    <div class="modal-card no-padding">
        <div class="modal-card-title">
            <h4>Toggle filters</h4>
        </div>

        <div class="modal-card-content-fixed no-padding">
            @foreach($resource->getFilters() as $filter)
                @foreach($filter->fields() as $field)
                    {{ $field->render() }}
                @endforeach
            @endforeach
        </div>

        <div class="modal-card-footer">
            <a wire:click.prevent="toggleFilterModal" class="button-link">
                Cancel
            </a>
        </div>
    </div>
</div>
