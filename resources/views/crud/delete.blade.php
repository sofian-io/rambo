@extends('rambo::layouts.admin')

@section('content')
    <div class="card no-padding">
        <livewire:rambo-crud-resource-delete
            :resource="$resource"
            :item="$item"
        />
    </div>
@endsection
