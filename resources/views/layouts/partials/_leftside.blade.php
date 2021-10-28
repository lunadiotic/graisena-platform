<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
            </div>
            <p class="text-muted">Administrator</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i data-feather="airplay"></i>
                        <span> Home </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span class="badge bg-success rounded-pill float-end">4</span>
                        <span> Navigation </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index.html">Dropdown 1</a>
                            </li>
                            <li>
                                <a href="dashboard-2.html">Dropdown 2</a>
                            </li>
                            <li>
                                <a href="dashboard-3.html">Dropdown 3</a>
                            </li>
                            <li>
                                <a href="dashboard-4.html">Dropdown 4</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
