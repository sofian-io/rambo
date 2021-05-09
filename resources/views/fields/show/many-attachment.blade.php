<div class="attachment-picker-many">
    <div class="attachment-picker-many-attachments">
        @foreach ($field->getViewValue() as $key => $attachment)
            <div
                class="attachment-picker-many-attachments-item"
                style="background-image: url('{{ $attachment->format('thumb') }}')"
            ></div>
        @endforeach
    </div>
</div>
