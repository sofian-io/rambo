<div class="modal">
    <div class="modal-card no-padding">
        <div class="modal-card-title" wire:loading.remove>
            <h4>Upload a new attachment</h4>
        </div>

        <div class="modal-card-content" wire:loading.remove>
            <input
                id="upload"
                type="file"
                wire:model="upload"
                @if ($multipleUpload) multiple @endif
            >

            @if ($upload)
                @if ($multipleUpload)
                    @foreach ($upload as $item)
                        @if ($item)
                            <img src="{{ $item->temporaryUrl() }}">
                        @endif
                    @endforeach
                @else
                    <img src="{{ $upload->temporaryUrl() }}">
                @endif
            @endif
        </div>

        <div wire:loading class="modal-card-content">
            <x-rambo::loading />
        </div>

        <div class="modal-card-footer" wire:loading.remove>
            @if ($upload)
                <a wire:click.prevent="uploadImage" class="button">
                    Upload attachment
                </a>
            @endif

            <a wire:click.prevent="closeModal" class="button-link">
                Cancel
            </a>
        </div>
    </div>
</div>
