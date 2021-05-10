<div class="nav">
    <a
        class="nav-logo"
        href="{{ route('rambo.dashboard') }}"
    >
        <x-rambo::logo />
    </a>

    <div class="nav-main">
        <div class="nav-main-logo">
            <a href="{{ route('rambo.dashboard') }}">
                R
            </a>
        </div>

        {{-- ICONS --}}
        <ul class="nav-main-list">
            <li>
                <a href="{{ route('rambo.dashboard') }}">
                    <x-go-home-16 />
                </a>
            </li>

            <li>
                <a href="/" target="_blank">
                    <x-go-globe-16 />
                </a>
            </li>

            <li>
                <a href="{{ route('rambo.auth.logout') }}">
                    <x-go-sign-out-16 />
                </a>
            </li>
        </ul>
    </div>

    <div class="nav-sub">
        {{-- RESOURCES --}}
        <ul class="nav-sub-list">
            @foreach (Rambo::resources() as $resource)
                <li>
                    <a
                        href="{{ $resource->index() }}"
                        @if ($resource->isActive()) class="active" @endif
                    >
                        {{ $resource->label() }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
