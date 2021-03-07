@extends('rambo::layouts.admin')

@section('content')
    <div class="border p-5 pt-3 rounded-lg bg-white shadow">
        <div class="flex mb-4 pb-4 border-b">
            <h2 class="text-4xl">
                {{ $resource::getLabel() }}
            </h2>

            <div class="w-auto mt-4 ml-auto justify-end inline">
                <x-rambo::button
                    link="/admin/{{ $resource::getRouteBase() }}/create"
                    text="Create"
                />
            </div>
        </div>

        @if ($items->isNotEmpty())
            @if (method_exists($items, 'links'))
                <div class="m-3">
                    {{ $items->withQueryString()->links() }}
                </div>
            @endif

            <table class="w-full">
                <tr>
                    @foreach ($resource->getOnlyFieldsStack('index') as $field)
                        <td class="py-2 px-4 bg-red-800 text-red-100 font-bold">
                            {{ $field->getLabel() }}
                        </td>
                    @endforeach
                    <td class="py-2 px-4 bg-red-800 text-red-100 font-bold" colspan="3"></td>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        @foreach ($resource->getOnlyFieldsStack('index') as $field)
                            <td class="py-2 px-4 border-t">
                                {{ $field->item($item)->renderShow() }}
                            </td>
                        @endforeach
                        <td class="w-10 border-t">
                            <a href="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}">
                                <i class="py-2 px-4 text-xl text-center hover:opacity-50 far fa-eye"></i>
                            </a>
                        </td>
                        <td class="w-10 border-t">
                            <a href="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}/edit">
                                <i class="py-2 px-4 text-xl text-center hover:opacity-50 far fa-edit"></i>
                            </a>
                        </td>
                        <td class="w-10 border-t">
                            <a href="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}/delete">
                                <i class="py-2 px-4 text-xl text-center hover:opacity-50 far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>

            @if (method_exists($items, 'links'))
                <div class="m-3">
                    {{ $items->withQueryString()->links() }}
                </div>
            @endif
        @else
            <p>No items found.</p>
        @endif
    </div>
@endsection
