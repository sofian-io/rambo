@extends('rambo::layouts.admin')

@section('content')
    <div class="card no-padding">
        <livewire:rambo-crud-resource-show
            :resource="$resource"
            :item="$item"
        />
    </div>
@endsection
