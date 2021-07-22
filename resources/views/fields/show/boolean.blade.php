@if (in_array($field->getShowValue(), [1, true]))
    <span class="tag" style="background: rgb(7, 187, 7); border: 0">
        Yes
    </span>
@else
    <span class="tag" style="background: rgb(187, 7, 7); border: 0">
        No
    </span>
@endif
