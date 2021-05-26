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
                    <i class="fas fa-home"></i>
                </a>
            </li>

            <li>
                <a href="/" target="_blank">
                    <i class="fas fa-globe"></i>
                </a>
            </li>

            <li>
                <a href="{{ route('rambo.auth.logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="nav-sub">
        {{-- RESOURCES --}}
        <ul class="nav-sub-list">
            @php $navigation = Rambo::navigation() @endphp
            @foreach ($navigation['resources'] as $key => $resource)
                @php $depth = 1 @endphp
                @include('rambo::components.navigation.navigation-item', [
                    'resource' => $resource['resource'] ?? $resource,
                ])
            @endforeach

            <li class="nav-sub-list-filler">
                <span></span>
            </li>
        </ul>
    </div>
</div>
