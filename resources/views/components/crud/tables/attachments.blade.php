<div class="crud-index-attachments-container">
    @if (count($folders) > 2)
        <div class="crud-index-attachments-folders">
            <ul>
                @foreach ($folders as $key => $label)
                    @if ($key === $currentFolder)
                        <li wire:click="changeFolder('{{ $key }}')" class="active">
                            <i class="far fa-folder-open"></i>
                            {{ $label }}
                        </li>
                    @else
                        <li wire:click="changeFolder('{{ $key }}')">
                            <i class="far fa-folder"></i>
                            {{ $label }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

    <div wire:loading class="w-100">
        <x-rambo::loading />
    </div>

    <div wire:loading.remove class="crud-index-attachments">
        @foreach ($items as $item)
            <div class="crud-index-attachments-item">
                <div
                    class="crud-index-attachments-item-image"
                    style="background-image: url('{{ $item->format('thumb') }}')"
                ></div>

                <div class="crud-index-attachments-item-actions">
                    @foreach ($resource->actions() as $action)
                        {{ (new $action($resource, $currentUrl, $item))->render() }}
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
