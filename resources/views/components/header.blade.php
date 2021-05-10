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

    {{-- PROFILE --}}
    <div class="header-profile">
        <a href="{{ Rambo::user()->link() }}">
            <img src="{{ optional(Rambo::user()->avatar)->format('thumb') }}">
            <p>{{ Rambo::user()->username }}</p>
        </a>
    </div>
</div>
