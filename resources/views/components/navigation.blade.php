@foreach (config('rambo.resources', []) as $resource)
    <a
        href="/admin/{{ $resource::getRouteBase() }}"
        class="
            block px-5 py-3 border-b hover:bg-red-100
            @if (request()->is("admin/{$resource::getRouteBase()}*")) bg-red-200 @endif
        "
    >
        <span class="inline-block w-4 text-center">
            {!! config('rambo.icons', [])[$resource::getRouteBase()] ?? '' !!}
        </span>

        <span class="ml-4">
            {{ $resource::getLabel() }}
        </span>
    </a>
@endforeach
