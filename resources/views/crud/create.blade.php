@extends('rambo::layouts.admin')

@section('content')
    <div class="card no-padding">
        <livewire:rambo-crud-resource-create
            :resource="$resource"
        />
    </div>
@endsection
