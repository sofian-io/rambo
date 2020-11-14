@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white">
        <h2 class="text-4xl mb-4 pb-4 border-b">
           {{ $resource::$labelSingular }}:
           {{ $item[$resource::$nameField] }}
        </h2>

        <div class="flex flex-wrap">
            <div class="w-full border-b p-4 border-opacity-25">
                <a target="_blank" class="inline-block w-1/2" href="{{ $item->path() }}">
                    <img class="w-full" src="{{ $item->path() }}">
                </a>
            </div>

            @foreach ($resource->getOnlyFieldsStack() as $field)
                <div class="w-1/6 @if(!$loop->last) border-b @endif p-4 border-opacity-25">
                    {{ $field->getLabel() }}
                </div>

                <div class="w-5/6 @if(!$loop->last) border-b @endif p-4 border-opacity-25">
                    {{ $field->item($item)->renderShow() }}
                </div>
            @endforeach
        </div>

        <a
            href="/admin/{{ $resource::$routeBase }}"
            class="inline-block mt-4 cursor-pointer rounded bg-red-800 px-10 py-2 font-bold text-red-100 hover:bg-red-900"
        >
            Return to index
        </a>
    </div>
@endsection
