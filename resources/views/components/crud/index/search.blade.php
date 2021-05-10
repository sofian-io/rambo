@if ($resource->searchableFields())
    <input
        type="text"
        wire:key="seach_{{ $resource->routebase() }}"
        wire:model.250ms="search"
        placeholder="Search for {{ $resource->label() }}"
    >
@endif
