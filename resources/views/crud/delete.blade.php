@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white">
        <h2 class="text-4xl mb-4 pb-4 border-b">
            Deleting "{{ $item[$resource::$nameField] }}" ({{ $item->id }})
        </h2>

        <p class="mb-4">
            Are you sure you wish to delete "<b>{{ $item[$resource::$nameField] }}</b>"?
        </p>

        <a
            href="/admin/{{ $resource::$routeBase }}"
            class="inline-block mr-4 cursor-pointer rounded bg-red-800 px-10 py-2 font-bold text-red-100 hover:bg-red-900"
        >
            Cancel
        </a>

        <a
            href="/admin/{{ $resource::$routeBase }}/{{ $item->id }}/delete-confirm"
            class="inline-block cursor-pointer rounded bg-green-500 px-10 py-2 font-bold text-green-100 hover:bg-green-700"
        >
            Confirm
        </a>
    </div>
@endsection
