<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">


    <!-- Title Page-->
    <title>PHP Developer Assessment</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('assets') }}/css/styles.css" rel="stylesheet" media="all">
    <link href="{{ asset('assets') }}/css/dataTable.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ asset('assets') }}/js/all.min.js" ></script>

</head>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">PHP Developer Assessment</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
   
    <!-- Navbar-->
    
</nav>
<div id="layoutSidenav">
    @auth
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"></div>
                        Posts
                    </a>                   
                    <div class="sb-sidenav-menu-heading">User</div>
                    <a class="nav-link" href="{{ route('profile') }}">
                        <div class="sb-nav-link-icon"></div>
                        Profile
                    </a>
                    <a class="nav-link" href="{{ route('logout') }}">
                        <div class="sb-nav-link-icon"></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->firstName }}  {{ auth()->user()->lastName }}
            </div>
        </nav>
    </div>
    @endauth

    <div id="layoutSidenav_content">
        <main>
             @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/js/scripts.js"></script>
<script src="{{ asset('assets') }}/js/simple-datatableslatest.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
@stack('js')
</body>

</html>