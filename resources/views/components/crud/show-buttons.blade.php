<div class="w-auto mt-4 ml-auto justify-end inline">
    <x-rambo::button
        link="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}/edit"
        text="Edit"
    />

    <x-rambo::button
        class="ml-4"
        link="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}/delete"
        text="Delete"
    />

    <x-rambo::button
        class="ml-4"
        link="/admin/{{ $resource::getRouteBase() }}"
        text="Overview"
    />
</div>
