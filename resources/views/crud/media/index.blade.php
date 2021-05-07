@extends('rambo::layouts.admin')

@section('content')
    <livewire:rambo-crud-media-table :resource="$resource" />
@endsection
