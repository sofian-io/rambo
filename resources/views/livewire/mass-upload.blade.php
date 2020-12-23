<div>
    <div class="w-full">
        <div class="w-full">
            <input type="file" wire:model="new" multiple>

            @if ($uploads !== [])
                <ul class="my-2">
                    @foreach ($uploads as $upload)
                        <li class="mb-2">{{ $upload->getClientOriginalName() }}</li>
                    @endforeach
                </ul>

                <a wire:click="upload" class="rambo-button">
                    Upload
                </a>
            @endif
        </div>
    </div>
</div>
