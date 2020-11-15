@extends('rambo::layouts.auth')

@section('content')
    <div class="w-1/3 my-10 mx-auto">
        <div class="px-20 mb-4">
            <x-rambo::logo />
        </div>

        <div class="border bg-white p-5 rounded-lg shadow-xl">
            <livewire:rambo-login />
        </div>
    </div>
@endsection
