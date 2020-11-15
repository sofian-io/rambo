@foreach (config('rambo.resources', []) as $resource)
    <a
        href="/admin/{{ $resource::$routeBase }}"
        class="
            block px-5 py-3 border-b hover:bg-red-100
            @if (request()->is("admin/{$resource::$routeBase}*")) bg-red-200 @endif
        "
    >
        {!! config('rambo.icons', [])[$resource::$routeBase] ?? '' !!}
        {{ $resource::$label }}
    </a>
@endforeach
