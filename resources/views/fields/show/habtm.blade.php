<ul>
    @foreach ($field->getValue() ?? [] as $item)
        <li>
            <a
                href="/admin/{{ $field->targetResource::$routeBase }}/{{ $item->id }}"
                class="inline-block font-bold text-red-500 hover:text-red-800 mb-1"
            >
                {{ $item->{$field->targetResource::$nameField} ?? $item->id }}
            </a>
        </li>
    @endforeach
</ul>
