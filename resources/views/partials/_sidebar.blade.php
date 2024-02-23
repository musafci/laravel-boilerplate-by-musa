<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="@if (Auth::user()->Logo){{Auth::user()->Logo}}@else{{asset('images/default_logo.svg')}}@endif" alt="Ad Portal" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            @if (Auth::user()->AppName)
                {{Auth::user()->AppName}}
            @else
                {{ config('app.name') }}
            @endif
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{auth()->user()->getPhotoUrl()}}" class="img-circle elevation-3" alt="User Image">
            </div>
            <div class="info">
               {{-- <a href="javascript:;" class="d-block">{{auth()->user()->name}}</a> --}}
                <a href="{{route('profile')}}" @if(in_array(Request::route()->getName(), ["profile"])) active @endif">
                    {{ auth()->user()->name }}
                </a>
            </div>
        </div>
        <!-- Sidebar menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column toggled" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link  @if(in_array(Request::route()->getName(), ["dashboard"])) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["user.index"])) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item " style=" color: #212529 !important;">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview treeview-menu ">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["category.index"])) active @endif">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('version.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["version.index"])) active @endif">
                                <i class="nav-icon fas fa-code-branch"></i>
                                <p>Version</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('app.setting.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["app.setting.index"])) active @endif">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>App Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('dentist-office.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["dentist-office.index"])) active @endif">
                        <i class="nav-icon fas fa-hospital"></i>

                        <p>Dentist Office</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ticket.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["ticket.index"])) active @endif">
                        <i class="nav-icon fas fa-light fa-clipboard-list"></i>
                        <p>Tickets</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('activity-log.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["activity-log.index"])) active @endif">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Activity Log</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('menu.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["menu.index"])) active @endif">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>Menu</p>
                    </a>
                </li>
                @can('access-setting')
                    <li class="nav-item " style=" color: #212529 !important;">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview treeview-menu ">
                            @can('role-setting')
                                <li class="nav-item">
                                    <a href="{{route('role.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["role.index"])) active @endif">
                                        <i class="nav-icon fas fa-user-tag"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-setting')
                                <li class="nav-item">
                                    <a href="{{route('permission.index')}}" class="nav-link @if(in_array(Request::route()->getName(), ["permission.index"])) active @endif">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <p>Permission</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="javascript:;;" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
