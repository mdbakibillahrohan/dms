<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
            <div class="image">
                <img src="{{ asset('Asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                @if (Session::has('dashboard_type'))
                    @if (session('dashboard_type')[0] == 'admin')
                        <a href="#" class="d-block">{{ auth::guard('admin')->user()->name }}</a>
                    @elseif(session('dashboard_type')[0] == 'teacher')
                        <a href="#" class="d-block">{{ auth::guard('teacher')->user()->name }}</a>
                    @endif

                @endif
            </div>
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

                @endphp
                <li class="nav-item">
                    @if (Session::has('dashboard_type'))
                        @if (session('dashboard_type')[0] == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        @elseif(session('dashboard_type')[0] == 'teacher')
                            <a href="{{ route('teacher.dashboard') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    @endif


                </li>

                @foreach ($all_menus as $menu)
                    <li class="nav-item menu-open">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{ $menu->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($menu->submenu as $submenu)
                                <li class="nav-item">
                                    <a href="" class="nav-link">
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
                        @if (session('dashboard_type')[0] == 'admin')
                            <a href="{{ route('admin.logout') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Logout</p>
                            </a>
                        @elseif (session('dashboard_type')[0] == 'teacher')
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
