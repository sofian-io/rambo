<div class="attachment-picker-many">
    <div class="attachment-picker-many-attachments">
        @foreach ($field->getShowValue() as $key => $attachment)
            <a href="/admin/attachments/{{ $attachment->id }}" class="mr-1">
                <img src="{{ $attachment->format('thumb') }}">
            </a>
        @endforeach
    </div>
</div>
