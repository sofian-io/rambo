@extends('rambo::layouts.crud')

@section('content')
    <div class="border p-5 pt-2 rounded-lg bg-white">
        <h2 class="text-4xl mb-4 pb-4 border-b">
           {{ (new \ReflectionClass($resource))->getShortName() }}:
           {{ $item[$resource::$nameField] }}
        </h2>

        <a
            href="/admin/{{ $resource::$routeBase }}"
            class="inline-block mb-4 cursor-pointer rounded bg-red-800 px-10 py-2 font-bold text-red-100 hover:bg-red-900"
        >
            Return to index
        </a>

        <div class="flex flex-wrap">
            @foreach ($resource->getOnlyFieldsStack() as $field)
                <div class="w-1/6 @if(!$loop->last) border-b @endif p-4 border-opacity-25">
                    {{ $field->getLabel() }}
                </div>

                <div class="w-5/6 @if(!$loop->last) border-b @endif p-4 border-opacity-25">
                    {{ $field->item($item)->renderShow() }}
                </div>
            @endforeach
        </div>
    </div>
@endsection
