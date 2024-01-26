<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary h-100" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto pt-4">
        
            <li class="nav-item">
                <a href="{{ route('admin.apartments.index') }}"
                    class="nav-link @if (Route::currentRouteName() == 'admin.apartments.index') active @endif" aria-current="page">
                    <strong class="fs-5">My Apartments</strong>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.messages') }}"
                    class="nav-link @if (Route::currentRouteName() == 'admin.messages') active @endif" aria-current="page">
                    <strong class="fs-5">Messages</strong>
                </a>
            </li>

    </ul>
</div>
