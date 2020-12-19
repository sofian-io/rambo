<div>
    <div class="w-full">
        <div class="w-full">
            <input type="file" wire:model="new" multiple>

            @if ($uploads !== [])
                <div class="grid grid-cols-6 gap-2 my-4">
                    @foreach ($uploads as $upload)
                        <div
                            class="bg-cover bg-center border rounded"
                            style="padding-top: 100%; background-image: url({{ $upload->temporaryUrl() }})"
                        ></div>
                    @endforeach
                </div>

                <a wire:click="upload" class="rambo-button">
                    Upload
                </a>
            @endif
        </div>
    </div>
</div>
