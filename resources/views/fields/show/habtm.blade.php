@if ($field->getViewValue()->isNotEmpty())
    <ul class="habtm-picker-list">
        @foreach ($field->getViewValue() as $item)
            <li>
                <a href="{{ $field->getShowRouteItem($item) }}">
                    {{ $item->{$field->getDisplayNameResource()} }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <ul class="habtm-picker-list">
        <li>Nothing selected</li>
    </ul>
@endif
