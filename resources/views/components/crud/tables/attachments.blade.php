<div class="crud-index-attachments">
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
