@php
use \App\Http\Controllers\MenuPermissionController;
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <marquee class="text-center text-success pl-5 text-bold">Bismillah Hir Rahaman Hir Rahim</marquee>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item d-none d-sm-inline-block">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-md btn-outline-danger">Logout</button>
            </form>
        </li>
    </ul>


</nav>
