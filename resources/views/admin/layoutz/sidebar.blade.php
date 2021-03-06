<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}"> -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center logo-left bg-white" href="{{url('/')}}">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->

        <div class="sidebar-brand-icon ">
            <!-- <i class="text-primary"> KW</i> -->
            <div class="sidebar-brand-text mx-1 text-info">Khalsa Works</div>    
        </div>
        <!-- <div class="sidebar-brand-text mx-1">Khalsa Works</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

     <!-- Nav Item - Users -->
     <li class="nav-item {{-- Request::is('users*') ? 'active' : '' --}}">
        <a class="nav-link" href="{{-- url('users') --}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

     <!-- Nav Item - Companies -->
     <li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('companies')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Companies</span></a>
    </li>

     {{-- <!-- Nav Item - Sub Categories -->
     <li class="nav-item {{ Request::is('sub-categories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('sub-categories')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub Categories</span></a>
    </li>

    <!-- Nav Item - Sub Sub Categories -->
    <li class="nav-item {{ Request::is('sub-sub-categories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('sub-sub-categories')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub Sub Categories</span></a>
    </li>

    <!-- Nav Item - Sub Sub Categories Type -->
    <li class="nav-item {{ Request::is('sub-sub-category-types*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('sub-sub-category-types')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub Sub Category Types</span></a>
    </li>

    <!-- Nav Item - Materials -->
    <li class="nav-item {{ Request::is('materials*') ? 'active' : '' }}" >
        <a class="nav-link" href="{{url('materials')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Materials</span></a>
    </li>

     <!-- Nav Item - Brands -->
     <li class="nav-item {{ Request::is('brands*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('brands')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Brands</span></a>
    </li>

    <!-- Nav Item - Colors -->
    <li class="nav-item {{ Request::is('colors*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('colors')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Colors</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Products -->
    <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('products')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Products -->
    <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('products')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span></a>
    </li> --}}

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->