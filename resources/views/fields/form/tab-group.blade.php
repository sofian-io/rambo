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
                @php $errorCount = $field->tabValidationErrors($key, $errors) @endphp
                <li
                    :class="{ 'active': tab === '{{ $key }}' }"
                    @if ($errorCount) class="tab-warning" @endif
                    @click.prevent="tab = '{{ $key }}'"
                >
                    {{ $label }}

                    @if ($errorCount)
                        <span>
                            ({{ $errorCount }} <i class="fas fa-exclamation-triangle"></i>)
                        </span>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="crud-form-field-tab-group-content-fields">
            @foreach ($field->getTabs() as $key => $label)
                <div x-show="tab === '{{ $key }}'">
                    @foreach ($field->getFields()[$key] as $_field)
                        {!!
                            $_field
                                ->item($field->item)
                                ->emit($field->emit)
                                ->render()
                        !!}
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
