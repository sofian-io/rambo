<div class="modal">
    <div class="modal-card no-padding">
        <div class="modal-card-title" wire:loading.remove>
            <h4>Deleting: {{ $deleting['name'] }}</h4>
        </div>

        <div class="modal-card-content" wire:loading.remove>
            Are you sure you wish to delete "<strong>{{ $deleting['name'] }}</strong>?"
        </div>

        <div wire:loading class="modal-card-content">
            <x-rambo::loading />
        </div>

        <div class="modal-card-footer" wire:loading.remove>
            <a wire:click.prevent="deleteItem({{ $deleting['id'] }})" class="button">
                Delete
            </a>

            <a wire:click.prevent="closeDeleteModal" class="button-link">
                Cancel
            </a>
        </div>
    </div>
</div>
