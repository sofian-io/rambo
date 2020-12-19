<div>
    @if (!$item)
        <a
            class="inline-block cursor-pointer rounded bg-red-800 px-4 py-2 font-bold text-red-100 hover:bg-red-900 mr-4"
            wire:click.prevent="openSelectingModal"
        >
            Select image
        </a>

        <a
            class="inline-block cursor-pointer rounded bg-red-800 px-4 py-2 font-bold text-red-100 hover:bg-red-900"
            wire:click.prevent="openUploadingModal"
        >
            Upload image
        </a>
    @endif

    <div class="@if ($compact) flex w-full items-center @endif">
        @if ($item)
            <img
                class="@if ($compact) mr-4 w-24 @else mb-4 w-48 @endif"
                src="{{ $item }}"
            >

            <div>
                <button
                    class="
                        cursor-pointer rounded bg-red-800 px-4 py-2 font-bold
                        text-red-100 hover:bg-red-900 mr-4
                    "
                    wire:click.prevent="resetImage"
                >
                    <i class="fas fa-times"></i>
                    @if (! $compact) Remove @endif
                </button>
            </div>
        @endif
    </div>

    @if ($selecting)
        <div class="fixed z-50 top-0 left-0 w-full h-screen bg-black bg-opacity-50">
            <div class="relative p-5 bg-gray-100 rounder-lg border mt-10 mx-auto w-1/2">
                <div class="w-full">
                    <h2 class="text-xl border-b pb-4 mb-4">Select an attachment</h2>
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

                @if ($search !== '' && $attachments->isNotEmpty())
                    <p class="w-full pl-1 mb-4">
                        Results for <b>"{{ $search }}"</b>:
                    </p>
                @endif

                <div style="height: 60vh" class="w-full scrolling-touch overflow-auto">

                    @if ($attachments->isNotEmpty())
                        <div class="grid grid-cols-5 gap-5">
                            @foreach ($attachments as $attachment)
                                <img
                                    class="cursor-pointer hover:opacity-75"
                                    src="{{ $attachment->format('thumb') }}"
                                    title="{{ $attachment->alt_name }}"
                                    alt="{{ $attachment->alt_name }}"
                                    wire:click="chooseAttachment({{ $attachment->id }})"
                                >
                            @endforeach
                        </div>
                    @else
                        @if ($search !== '')
                            <p class="w-full pl-1 mb-4">
                                No attachments found with name <b>"{{ $search }}"</b>.
                            </p>
                        @else
                            <p class="w-full pl-1 mb-4">No attachments found.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if ($uploading)
        <div class="fixed z-50 top-0 left-0 w-full h-screen bg-black bg-opacity-50">
            <div class="relative p-5 bg-gray-100 rounder-lg border mt-10 mx-auto w-1/2">
                <div class="w-full">
                    <h2 class="text-xl border-b pb-4 mb-4">Upload an attachment</h2>
                    <a
                        class="cursor-pointer p-4 absolute top-0 right-2 text-2xl"
                        wire:click.prevent="closeModal"
                    >
                        <i class="fas fa-times"></i>
                    </a>
                </div>

                <div class="flex">
                    <div class="w-full">
                        <input id="{{ $name }}_upload" type="file" wire:model="upload">

                        @if ($upload)
                            <div
                                class="bg-cover w-40 h-40 mt-4"
                                style="background-image: url({{ $upload->temporaryUrl() }})"
                            ></div>
                        @endif
                    </div>
                </div>

                @if ($upload)
                    <div class="w-full border-t mt-6 pt-6">
                        <a
                            class="cursor-pointer rounded bg-red-800 px-4 py-2 font-bold text-red-100 hover:bg-red-900 mr-4"
                            wire:click.prevent="uploadFile"
                        >
                            Upload
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
