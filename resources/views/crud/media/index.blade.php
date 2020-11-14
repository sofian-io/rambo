@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white">
        <h2 class="text-4xl mb-4 pb-4 border-b">
            {{ $resource::$label }}
        </h2>

        @if ($items->isNotEmpty())
            <div class="grid grid-cols-5 gap-5">
                @foreach ($items as $item)
                    <div class="border">
                        <div class="group relative hover:opacity-100">
                            <div class="absolute bottom-0 w-full p-2 bg-white opacity-0 group-hover:opacity-75">
                                {{ $item->alt_name }}
                            </div>
                            <img src="{{ $item->format('thumb') }}">
                        </div>
                        <div class="flex border-t">
                            <a
                                class="w-1/3 p-2 inline-block text-xl text-center hover:opacity-50"
                                href="/admin/{{ $resource::$routeBase }}/{{ $item->id }}"
                            >
                                <i class="py-2 px-4 far fa-eye"></i>
                            </a>

                            <a
                                class="w-1/3 p-2 inline-block text-xl text-center hover:opacity-50"
                                href="/admin/{{ $resource::$routeBase }}/{{ $item->id }}/edit"
                            >
                                <i class="py-2 px-4 far fa-edit"></i>
                            </a>

                            <a
                                class="w-1/3 p-2 inline-block text-xl text-center hover:opacity-50"
                                href="/admin/{{ $resource::$routeBase }}/{{ $item->id }}/delete"
                            >
                                <i class="py-2 px-4 far fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No items found.</p>
        @endif
    </div>
@endsection
