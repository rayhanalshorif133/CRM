@php
use \App\Http\Controllers\MenuPermissionController;
$menu_permission = MenuPermissionController::main_menu();
$sub_menu_permission = MenuPermissionController::sub_menu();
@endphp
@if (auth()->user()->role != 'abc')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link text-center">
        <b>CRM</b>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('image/admin_layout/avatar5.png') }}" class="img-thumbnail elevation-2"
                    alt="Admin Photo">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    <b class="text-info">{{ (auth()->user()->name)?auth()->user()->name:'' }}</b>
                    <br />@<small class="text-success">{{ (auth()->user()->role)?auth()->user()->role:'' }}</small>
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link {{((isset($main_menu) && $main_menu=='home')?'active':'')}}">
                        <i class="fas fa-home fa-lg "></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item {{((isset($main_menu) && $main_menu=='deals')?'menu-open':'')}}">

                    <a href="#" class="nav-link {{((isset($main_menu) && $main_menu=='deals')?'active':'')}} ">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Deals
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li>
                            <a href="{{ route('create-customer') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='create-customer')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Deal</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pending-deal') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='pending-deal')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Deal</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index-deal') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='index-deal')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deals</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{((isset($main_menu) && $main_menu=='reports')?'menu-open':'')}}">
                    <a href="#" class="nav-link {{((isset($main_menu) && $main_menu=='reports')?'active':'')}} ">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li>
                            <a href="{{ route('report.index') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='report-list')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report List</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('report.chart.index') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='chart-list')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chart</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item {{((isset($main_menu) && $main_menu=='basic_settings')?'menu-open':'')}}">

                    <a href="#" class="nav-link {{((isset($main_menu) && $main_menu=='basic_settings')?'active':'')}} ">
                        <i class="nav-icon fas fa-calculator "></i>
                        <p>
                            Basic Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li>
                            <a href="{{ route('user-list') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='user')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <!--<li>
                            <a href="{{ route('user-permission') }}" class="nav-link {{((isset($child_menu) && $child_menu=='user-permission')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users Permission</p>
                            </a>
                        </li>-->
                        <li>
                            <a href="{{ route('service-list') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='service-list')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Services</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sub-service-list') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='sub-service-list')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Services</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('company-information') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='company-information')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Company Information</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item" style="margin-top: 20px">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
@else
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link text-center">
        <b>{{ Session::get('company_name') }}</b>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('image/admin_layout/avatar5.png') }}" class="img-thumbnail elevation-2"
                    alt="Admin Photo">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    <b class="text-info">{{ (auth()->user()->name)?auth()->user()->name:'' }}</b>
                    <br />@<small class="text-success">{{ (auth()->user()->role)?auth()->user()->role:'' }}</small>
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-home fa-lg "></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                @if (is_numeric(array_search('basic_settings', array_column($menu_permission, 'menu_slug'))))
                <li class="nav-item {{((isset($main_menu) && $main_menu=='basic_settings')?'menu-open':'')}}">

                    <a href="#" class="nav-link {{((isset($main_menu) && $main_menu=='basic_settings')?'active':'')}} ">
                        <i class="nav-icon fas fa-calculator "></i>
                        <p>
                            Basic Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li>
                            <a href="{{ route('user-list') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='user')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user-permission') }}"
                                class="nav-link {{((isset($child_menu) && $child_menu=='user-permission')?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item" style="margin-top: 20px">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
@endif
