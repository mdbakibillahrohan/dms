<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('Asset/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">DMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @if (Session::has('dashboard_type'))
                @if (session('dashboard_type') == 'admin')
                    <div class="image">
                        <img src="{{ asset('Asset/img/admin.webp') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth::guard('admin')->user()->name }}</a>
                    </div>
                @elseif(session('dashboard_type') == 'teacher')
                    <div class="image">
                        <img src="{{ asset('uploaded_files/photo') . '/' . auth::guard('teacher')->user()->picture }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth::guard('teacher')->user()->name }}</a>
                    </div>
                @endif

            @endif

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                @php

                    use App\Models\Menus\Menu;
                    $all_menus = Menu::all();
                    $fullUrl = Request::url();
                    $host = $_SERVER['HTTP_HOST'];
                    $route = substr($fullUrl, strlen($host) + 8);
                    $two = explode('/', $route);

                @endphp
                <li class="nav-item">
                    @if (Session::has('dashboard_type'))
                        @if (session('dashboard_type') == 'admin')
                            @if (isset($two[1]))
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link {{ $two[1] == 'dashboard' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            @else
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            @endif
                        @elseif(session('dashboard_type') == 'teacher')
                            @if (isset($two[1]))
                                <a href="{{ route('teacher.dashboard') }}"
                                    class="nav-link {{ $two[1] == 'dashboard' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            @else
                                <a href="{{ route('teacher.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            @endif

                        @endif
                    @else
                        <a href="{{ route('home') }}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    @endif


                </li>

                @foreach ($all_menus as $menu)
                    @php
                        $isThisMenu = false;
                        if (isset($two[1])) {
                            if ($two[1] != 'dashboard') {
                                $isThisMenu = $menu->name == ucfirst($two[0]);
                            }
                        }

                    @endphp
                    <li class="nav-item {{ $isThisMenu ? 'menu-open' : '' }}">

                        <a href="#" class="nav-link {{ $isThisMenu ? 'active' : '' }}">
                            {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                            <i class="nav-icon {{ $menu->class }}"></i>
                            <p>
                                {{ $menu->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($menu->submenu as $submenu)
                                <li class="nav-item">
                                    <a href="{{ route($submenu->route) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $submenu->name }}</p>
                                    </a>
                                </li>
                            @endforeach

                        </ul>


                    </li>
                @endforeach



                <li class="nav-item">

                    @if (Session::has('dashboard_type'))
                        @if (session('dashboard_type') == 'admin')
                            <a href="{{ route('admin.logout') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Logout</p>
                            </a>
                        @elseif (session('dashboard_type') == 'teacher')
                            <a href="{{ route('teacher.logout') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Logout</p>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Logout</p>
                        </a>


                    @endif
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
