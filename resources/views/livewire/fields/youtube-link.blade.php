<div>
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $label }}"
        wire:model="value"
        @if ($readonly) disabled @endif
    >

    @if ($youtubeId)
        <iframe
            class="mx-2 mt-1"
            width="560" height="315"
            src="https://www.youtube.com/embed/{{ $youtubeId }}"
            frameborder="0"
            allowfullscreen
        ></iframe>
    @else
        @if ($value)
            <p class="mx-2 mt-1 text-red-500">
                No valid youtube link found.
            </p>
        @endif
    @endif
</div>
