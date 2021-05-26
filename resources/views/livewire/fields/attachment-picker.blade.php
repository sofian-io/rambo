<div class="attachment-picker">
    @if ($value)
        <div class="attachment-picker-selection">
            <img src="{{ $value->format('thumb') }}">
        </div>

        <div class="attachment-picker-actions">
            <a class="button" wire:click.prevent="openSelectModal">
                Select attachment
            </a>

            <a class="button" wire:click.prevent="clearSelection">
                Clear selection
            </a>
        </div>
    @else
        <div class="attachment-picker-actions">
            <a class="button" wire:click.prevent="openSelectModal">
                Select attachment
            </a>

            <a class="button" wire:click.prevent="openUploadModal">
                Upload attachment
            </a>
        </div>
    @endif

    @if ($uploading)
        <x-rambo::modals.attachment-upload-modal
            :upload="$upload"
        />
    @elseif ($selecting)
        <x-rambo::modals.attachment-select-modal
            :attachments="$attachments"
            :search="$search"
        />
    @endif
</div>
