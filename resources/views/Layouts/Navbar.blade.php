<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> 
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i> 
                </a> 
            </li>
        </ul> <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{ asset('asset/dist/assets/img/profil.jpg') }}" class="user-image rounded-circle shadow" alt="User Image">
                    <span class="d-none d-md-inline">I Gede Akira Iswara</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="{{ asset('asset/dist/assets/img/profil.jpesg') }}" class="rounded-circle shadow" alt="User Image">
                        <p>Akira - Pemilik Toko</p>
                    </li> <!--end::User Image-->

                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <!-- Tambahkan link ke halaman login -->
                        <a href="{{ route('login') }}" class="btn btn-default btn-flat float-end">Sign out</a>
                    </li> <!--end::Menu Footer-->
                </ul>
            </li> <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header-->
