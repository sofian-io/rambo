@if ($field->getViewValue() === 1)
    <span class="crud-show-boolean-green">
        Yes
    </span>
@else
    <span class="crud-show-boolean-red">
        No
    </span>
@endif
