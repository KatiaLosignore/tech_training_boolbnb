<div class="">
    <ul class="nav nav-pills flex-column mb-auto pt-4">

        @if (isset($apartments))
            <li class="nav-item">
                <a href="{{ route('admin.apartments.index') }}"
                    class="nav-link @if (Route::currentRouteName() == 'admin.apartments.index') active @endif" aria-current="page">
                    <strong class="fs-5">My Apartments</strong>
                </a>
            </li>
        @else
            {{-- <li>
                <a href="{{ route('admin.aparments.create') }}"
                    class="nav-link @if (Route::currentRouteName() == 'admin.aparments.create') active @endif" aria-current="page">
                    Crea nuovo appartamento
                </a>
            </li> --}}
        @endif


    </ul>
</div>
