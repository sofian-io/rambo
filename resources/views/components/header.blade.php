<div class="header">
    {{-- BREADCRUMBS --}}
    @isset($breadcrumbs)
        <ul class="header-breadcrumbs">
            @foreach ($breadcrumbs as $crumb)
                <li>
                    <a href="{{ $crumb['route'] }}">
                        {{ $crumb['label'] }}
                    </a>

                    @if (! $loop->last)
                        >
                    @endif
                </li>
            @endforeach
        </ul>
    @endisset
</div>
