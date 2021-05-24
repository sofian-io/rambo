<div class="crud-form-field-tab-group">
    <div
        class="crud-form-field-tab-group-content"
        x-data="{ tab: '{{ $field->getDefaultTab() }}' }"
    >
        <ul class="crud-form-field-tab-group-content-tabs">
            <li
                :class="{ 'active': tab === '__closed__' }"
                @click.prevent="tab = '__closed__'"
            >
                <i class="fas fa-compress-alt"></i>
            </li>
            @foreach ($field->getTabs() as $key => $label)
                <li
                    :class="{ 'active': tab === '{{ $key }}' }"
                    @click.prevent="tab = '{{ $key }}'"
                >
                    {{ $label }}
                </li>
            @endforeach
        </ul>

        <div class="crud-form-field-tab-group-content-fields">
            @foreach ($field->getTabs() as $key => $label)
                <div x-show="tab === '{{ $key }}'">
                    @foreach ($field->getFields()[$key] as $_field)
                        {!! $_field->item($field->item)->render() !!}
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
