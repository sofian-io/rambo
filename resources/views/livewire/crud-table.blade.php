<div>
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
        @if (count($actions) && count($checkboxes) > 0)
            <div class="mb-4">
                @foreach ($actions as $key => $action)
                    {!! $action->key($key)->render() !!}
                @endforeach
            </div>
        @elseif (method_exists($items, 'links'))
            <div class="m-3">
                {{ $items->withQueryString()->links() }}
            </div>
        @endif

        <form>
            <table class="w-full">
                <tr>
                    <td class="w-8 py-2 px-4 bg-red-800 text-red-100 font-bold" colspan="1"></td>
                    @foreach ($resource->getOnlyFieldsStack('index') as $field)
                        <td class="py-2 px-4 bg-red-800 text-red-100 font-bold">
                            {{ $field->getLabel() }}
                        </td>
                    @endforeach
                    <td class="py-2 px-4 bg-red-800 text-red-100 font-bold" colspan="3"></td>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td class="w-8 text-center py-2 px-4 border-t">
                            <input
                                wire:model="checkboxes.{{$item->id }}"
                                type="checkbox"
                            >
                        </td>
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
        </form>

        @if (method_exists($items, 'links'))
            <div class="m-3">
                {{ $items->withQueryString()->links() }}
            </div>
        @endif
    @else
        <p>No items found.</p>
    @endif
</div>
