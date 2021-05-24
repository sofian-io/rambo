<div class="crud-form-field-tab-group no-margin">
    <div
        colspan="2"
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
                    <table class="crud-show-table">
                        @foreach ($field->getFields()[$key] as $_field)
                            <tr>
                                @if (! $_field->hideLabel)
                                    <td class="crud-show-table-label">
                                        <span>
                                            {{ $_field->getLabel() }}
                                        </span>
                                    </td>
                                @endif

                                <td
                                    class="crud-show-table-value"
                                    @if ($_field->hideLabel) colspan="2" @endif
                                >
                                    <span class="crud-index-table-content">
                                        {!! $_field->item($field->item)->renderShow() !!}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</div>
