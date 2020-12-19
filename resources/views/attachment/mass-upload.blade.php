@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white shadow">
        <h2 class="text-4xl mb-4 pb-4 border-b">
            Mass attachment upload
        </h2>

        <livewire:rambo-mass-upload />
    </div>
@endsection
