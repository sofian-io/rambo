@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white shadow">
        <h2 class="text-4xl mb-4 pb-4 border-b">
            Deleting "{{ $item[$resource::$nameField] }}" ({{ $item->id }})
        </h2>

        <p class="mb-4">
            Are you sure you wish to delete "<b>{{ $item[$resource::$nameField] }}</b>"?
        </p>

        <a
            href="/admin/{{ $resource::$routeBase }}"
            class="mr-4 rambo-button"
        >
            Cancel
        </a>

        <a
            href="/admin/{{ $resource::$routeBase }}/{{ $item->id }}/delete-confirm"
            class="rambo-button-green"
        >
            Confirm
        </a>
    </div>
@endsection
