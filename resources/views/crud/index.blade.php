@extends('rambo::layouts.admin')

@section('content')
    <div class="card no-padding">
        <livewire:rambo-crud-index-table
            :resource="$resource"
        />
    </div>
@endsection
