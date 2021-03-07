<div>
    @if ($selections !== [])
        <table wire:sortable="sortSelections" class="mb-4">
            @foreach ($selections ?? [] as $key => $value)
                <tr
                    class="font-semibold mb-1 py-1"
                    @if ($sortable)
                        wire:sortable.item="{{ $value }}"
                        wire:key="task-{{ $value }}"
                        wire:sortable.handle
                    @endif
                >
                    @php $item = optional($items->where('id', $value)->first()) @endphp

                    @if ($sortable)
                        <td class="py-2">
                            <i class="fas fa-arrows-alt mr-2 text-md opacity-50"></i>
                        </td>
                    @endif

                    <td class="px-2 py-2">
                        {{ $item->{$targetResource::getNameField()} }}
                    </td>

                    <td class="pl-2 py-2">
                        <i
                            class="fas fa-trash-alt ml-2 text-md opacity-50 cursor-pointer"
                            wire:click="addToSelections({{ $item->id }})"
                        ></i>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <button class="rambo-button" wire:click="openModal">
        Choose items
    </button>

    @if ($selecting)
        <div class="fixed z-50 top-0 left-0 w-full h-screen bg-black bg-opacity-50">
            <div class="relative p-5 bg-gray-100 rounder-lg border mt-10 mx-auto w-1/2">
                <div class="w-full">
                    <h2 class="text-xl border-b pb-4 mb-4">Select related items</h2>
                    <a
                        class="cursor-pointer p-4 absolute top-0 right-2 text-2xl"
                        wire:click.prevent="closeModal"
                    >
                        <i class="fas fa-times"></i>
                    </a>
                </div>

                <input
                    type="text"
                    wire:model="search"
                    class="w-1/2 px-2 py-1 border rounded mb-4"
                    placeholder="Search"
                >

                @if ($search !== '' && $items->isNotEmpty())
                    <p class="w-full pl-1 mb-4">
                        Results for <b>"{{ $search }}"</b>:
                    </p>
                @endif

                <div style="height: 60vh" class="w-full scrolling-touch overflow-auto border rounded-lg">
                    @if ($items->isNotEmpty())
                        <div class="flex flex-wrap">
                            @foreach ($items as $key => $item)
                                @include($habtmComponent, [
                                    'key' => $key,
                                    'item' => $item,
                                    'selections' => $selections
                                ])
                            @endforeach
                        </div>
                    @else
                        @if ($search !== '')
                            <p class="w-full p-4 mb-4">
                                Nothing found with the current search query: <b>"{{ $search }}"</b>.
                            </p>
                        @else
                            <p class="w-full pl-1 mb-4">Nothing found.</p>
                        @endif
                    @endif
                </div>

                <a
                    class="rambo-button mt-4"
                    wire:click.prevent="closeModal"
                >
                    Close
                </a>
            </div>
        </div>
    @endif
</div>
