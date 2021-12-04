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
                        <i data-feather="file-text"></i>
                        <span> Programs </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('program.create') }}">Add New</a>
                            </li>
                            <li>
                                <a href="{{ route('program.index') }}">Program</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarVolunteer" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Volunteer </span>
                    </a>
                    <div class="collapse" id="sidebarVolunteer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('volunteer.create') }}">Add New</a>
                            </li>
                            <li>
                                <a href="{{ route('volunteer.index') }}">Volunteer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarNursary" data-bs-toggle="collapse">
                        <i data-feather="shield"></i>
                        <span> Nursery </span>
                    </a>
                    <div class="collapse" id="sidebarNursary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('nursery.create') }}">Add New</a>
                            </li>
                            <li>
                                <a href="{{ route('nursery.index') }}">Nursery</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebardistribution" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Distribution </span>
                    </a>
                    <div class="collapse" id="sidebardistribution">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('distribution.create') }}">Add New</a>
                            </li>
                            <li>
                                <a href="{{ route('distribution.index') }}">Distribution</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebardatamaster" data-bs-toggle="collapse">
                        <i data-feather="box"></i>
                        <span> Data Master </span>
                    </a>
                    <div class="collapse" id="sidebardatamaster">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('seed.index') }}">Bibit</a>
                            </li>
                        </ul>
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('user.index') }}">Pengguna</a>
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
