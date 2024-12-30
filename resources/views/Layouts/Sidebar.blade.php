<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ url('etalase') }}" class="brand-link"> <!-- Tautkan ke halaman etalase -->
            <!--begin::Brand Image-->
            <img src="{{ asset('asset/dist/assets/img/perabotan.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">TOKO PROPERTY</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ url('etalase') }}" class="nav-link active">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Data Etalase</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('barang-terjual') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Data Terjual</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
