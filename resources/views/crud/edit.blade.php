@extends('rambo::layouts.crud')

@section('content')
    <div class="border p-5 pt-2 rounded-lg bg-white">
        <h2 class="text-4xl mb-4 pb-4 border-b">
           {{ (new \ReflectionClass($resource))->getShortName() }}:
           {{ $item[$resource::$nameField] }}
        </h2>

        <livewire:rambo-form
            :form="get_class($resource)"
            :item="$item"
            :updating="$item->id"
        />
    </div>
@endsection
