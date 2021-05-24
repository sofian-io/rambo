<li>
    @if (is_array($resource))
        <input type="checkbox" id="sub-{{ $key }}">

        <div class="nav-sub-list-sub">
            <label for="sub-{{ $key }}">
                {{ $key }}
            </label>

            <ul>
                @php $_resource = $resource @endphp
                @foreach ($_resource as $key => $resource)
                    @include('rambo::components.navigation.navigation-item')
                @endforeach
            </ul>
        </div>
    @else
        <a
            href="{{ $resource->index() }}"
            @if ($resource->isActive()) class="active" @endif
        >
            {{ $resource->getLabel() }}
        </a>
    @endif
</li>
