<div class="w-full my-4 flex justify-end">
    <x-rambo::button
        link="/admin/{{ $resource::$routeBase }}/{{ $item->id }}/edit"
        text="Edit"
    />

    <x-rambo::button
        class="ml-4"
        link="/admin/{{ $resource::$routeBase }}/{{ $item->id }}/edit"
        text="Delete"
    />

    <x-rambo::button
        class="ml-4"
        link="/admin/{{ $resource::$routeBase }}"
        text="Overview"
    />
</div>
