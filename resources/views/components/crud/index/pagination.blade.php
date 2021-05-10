@if ($paginator->hasPages())
    @include('rambo::components.crud.pagination.text')
    @include('rambo::components.crud.pagination.links')
@endif
