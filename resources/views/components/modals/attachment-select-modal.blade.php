<div class="modal">
    <div class="modal-card no-padding">
        <div class="modal-card-title">
            <h4>Select an existing attachment</h4>
        </div>

        <div class="modal-card-subtitle">
            <input
                type="text"
                wire:model="search"
                placeholder="Search for an attachment"
            >
        </div>

        <div wire:loading class="w-100">
            <x-rambo::loading />
        </div>

        <div wire:loading.remove class="modal-card-content-fixed">
            @if ($attachments->isNotEmpty())
                <div class="attachment-picker-grid">
                    @foreach ($attachments as $attachment)
                        <div
                            style="background-image: url('{{ $attachment->format('thumb') }}')"
                            wire:click="updateAttachment({{ $attachment->id }})"
                        ></div>
                    @endforeach
                </div>
            @else
                <p>No attachments found with name "<strong>{{ $search }}</strong>."</p>
            @endif
        </div>

        <div class="pagination">
            {{ $attachments->withQueryString()->links('rambo::components.crud.index.pagination') }}
        </div>

        <div class="modal-card-footer">
            <a wire:click.prevent="closeModal" class="button-link">
                Cancel
            </a>
        </div>
    </div>
</div>
