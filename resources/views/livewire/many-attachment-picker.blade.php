<div>
    <div class="flex flex-wrap">
        @foreach ($attachments as $key => $attachment)
            <div
                class="mr-4 mb-4 w-24 h-24 bg-cover bg-center"
                style="background-image: url('{{ $attachment['preview'] }}')"
            >
                <i
                    wire:click="removeAttachment({{ $key }})"
                    class="
                        fa fa-trash
                        absolute p-2 m-1 cursor-pointer text-sm bg-white rounded
                    "
                ></i>
            </div>
        @endforeach
    </div>

    <livewire:rambo-attachment-picker
        emit="addAttachment"
        :clearOnUpdate="true"
    />
</div>
