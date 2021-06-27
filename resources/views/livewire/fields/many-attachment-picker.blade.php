<div class="attachment-picker-many">
    <div class="attachment-picker-many-attachments" wire:sortable="sortAttachments">
        @foreach ($value as $key => $attachment)
            <div
                class="attachment-picker-many-attachments-item"
                style="background-image: url('{{ $attachment->format('thumb') }}')"
                wire:key="attachment-{{ $key }}"
                wire:sortable.item="{{ $key }}"
            >
                <i
                    wire:click="removeAttachment({{ $key }})"
                    class="button fa fa-trash"
                ></i>

                <i
                    class="button fas fa-arrows-alt"
                    style="margin-left: 0; cursor: all-scroll;"
                    wire:sortable.handle
                ></i>
            </div>
        @endforeach
    </div>

    <livewire:rambo-fields-attachment-picker
        emit="picker:update"
        :clearOnUpdate="true"
        :field="null"
        :folder="$folder"
        :multipleUpload="true"
    />
</div>
