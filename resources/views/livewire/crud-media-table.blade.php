<div class="border p-5 pt-3 rounded-lg bg-white shadow">
    <div class="flex mb-4 pb-4 border-b">
        <h2 class="text-4xl">
            {{ $resource::getLabel() }}
        </h2>

        <div class="w-auto mt-4 ml-auto justify-end inline">
            <x-rambo::button
                link="/admin/attachments/mass-upload"
                text="Mass upload"
            />
        </div>
    </div>

    @if ($items->isNotEmpty())
        @if (method_exists($items, 'links'))
            <div class="m-3">
                {{ $items->withQueryString()->links() }}
            </div>
        @endif

        <div class="grid grid-cols-6 gap-5">
            @foreach ($items as $item)
                <div class="border">
                    <div class="group relative hover:opacity-100">
                        <div class="transition duration-500 break-words absolute bottom-0
                            w-full p-2 bg-white opacity-0 group-hover:opacity-75">
                            {{ $item->alt_name }}
                        </div>

                        <div
                            class="w-full bg-cover bg-center"
                            style="padding-top: 100%; background-image: url('{{ $item->format('thumb') }}')"
                        ></div>
                    </div>
                    <div class="flex border-t">
                        <a
                            class="w-1/3 p-2 inline-block text-xl text-center hover:opacity-50"
                            href="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}"
                        >
                            <i class="py-2 px-4 far fa-eye"></i>
                        </a>

                        <a
                            class="w-1/3 p-2 inline-block text-xl text-center hover:opacity-50"
                            href="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}/edit"
                        >
                            <i class="py-2 px-4 far fa-edit"></i>
                        </a>

                        <a
                            class="w-1/3 p-2 inline-block text-xl text-center hover:opacity-50"
                            href="/admin/{{ $resource::getRouteBase() }}/{{ $item->id }}/delete"
                        >
                            <i class="py-2 px-4 far fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if (method_exists($items, 'links'))
            <div class="m-3">
                {{ $items->withQueryString()->links() }}
            </div>
        @endif
    @else
        <p>No items found.</p>
    @endif
</div>
