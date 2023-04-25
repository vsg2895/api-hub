<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl  fixed-start ms-0 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0">
            <img src="{{ asset('assets/img/smart-tv.svg') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Api Hub Dashboard</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white
                {{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard.index' ? 'menu-active' : ''}}"
                   href="{{ route('dashboard.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white
                {{ \Illuminate\Support\Facades\Route::currentRouteName() === 'teams.customers.index' ? 'menu-active' : ''}}"
                   href="{{ route('teams.customers.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group</i>
                    </div>
                    <span class="nav-link-text ms-1">Customers</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white
                {{ str_contains(\Illuminate\Support\Facades\Route::currentRouteName(), 'clients.') ? 'menu-active' : ''}}"
                   href="{{ route('clients.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">co_present</i>
                    </div>
                    <span class="nav-link-text ms-1">Api Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>

                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</aside>

