<div class="flex flex-wrap">
    @foreach ($field->getValue() as $attachment)
        <a
            class="inline-block mr-2 mb-2"
            href="/admin/attachments/{{ $attachment->id }}"
        >
            <img
                class="h-24 w-24"
                src="{{ $attachment->format('thumb') }}"
            >
        </a>
    @endforeach
</div>
