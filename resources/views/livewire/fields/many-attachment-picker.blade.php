<div class="attachment-picker-many">
    <div class="attachment-picker-many-attachments">
        @foreach ($value as $key => $attachment)
            <div
                class="attachment-picker-many-attachments-item"
                style="background-image: url('{{ $attachment->format('thumb') }}')"
            >
                <i
                    wire:click="removeAttachment({{ $key }})"
                    class="button fa fa-trash"
                ></i>
            </div>
        @endforeach
    </div>

    <livewire:rambo-fields-attachment-picker
        emit="picker:update"
        :clearOnUpdate="true"
        :field="null"
        :folder="$folder"
    />
</div>
