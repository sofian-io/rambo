@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white shadow">
        <livewire:rambo-crud-media-table :resource="$resource" />
    </div>
@endsection
