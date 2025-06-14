<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link bg-primary">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PUSKESMAS</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/') }}" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-header">FITUR UTAMA</li>

                <li class="nav-item">
                    <a href="{{ url('pasien') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Manajemen Data Pasien</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>