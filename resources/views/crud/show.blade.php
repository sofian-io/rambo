@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white shadow">
        <div class="flex mb-4 pb-4 border-b">
            <h2 class="text-4xl">
                {{ $resource::$labelSingular }}:
                {{ $item[$resource::$nameField] }}
            </h2>

            <x-rambo::crud.show-buttons :resource="$resource" :item="$item" />
        </div>

        <div class="flex flex-wrap">
            @foreach ($resource->getOnlyFieldsStack('show') as $field)
                <div class="w-1/6 @if(!$loop->last) border-b @endif p-4 border-gray-200">
                    {{ $field->getLabel() }}
                </div>

                <div class="w-5/6 @if(!$loop->last) border-b @endif p-4 border-gray-200">
                    {{ $field->item($item)->renderShow() }}
                </div>
            @endforeach
        </div>
    </div>
@endsection
