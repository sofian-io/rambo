@isset($field->options[$field->getValue()])
    <a
        href="/admin/{{ $field->resource::$routeBase }}/{{ $field->getValue() }}"
        class="inline-block font-bold text-red-500 hover:text-red-800 mb-1"
    >
        {{ $field->options[$field->getValue()] }}
    </a>
@else
    -
@endisset
