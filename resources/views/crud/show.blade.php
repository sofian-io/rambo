@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white">
        <h2 class="text-4xl pb-4 border-b">
           {{ $resource::$labelSingular }}:
           {{ $item[$resource::$nameField] }}
        </h2>

        <x-rambo::crud.show-buttons :resource="$resource" :item="$item" />

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
