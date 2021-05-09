<div class="crud crud-delete">
    <div class="crud-title">
        <h1 class="h3">Deleting "{{ $resource->getItemName() }}" ({{ $resource->item->id }})</h1>

        <div class="crud-title-buttons">
            <ul>
                @foreach ($resource->deleteActions() as $action)
                    <li>
                        {{ (new $action($resource, $item))->render() }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="crud-delete-text">
        <p>
            Are you sure you wish to delete "<strong>{{ $resource->getItemName() }}</strong>?"
        </p>
    </div>

    <div class="crud-delete-buttons">
        <a class="button red-button" wire:click.prevent="cancel">
            Cancel
        </a>

        <a class="button" wire:click.prevent="confirm">
            Confirm
        </a>
    </div>
</div>
