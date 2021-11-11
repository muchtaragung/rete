<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="#" class="brand-link">
        <div class="shadow-none p-3 mb-5 bg-light rounded">
            <img width="300px" class="img-fluid" src="<?= site_url('assets/') ?>img/logo/logo_rt.png" alt="Logo">
            <!-- <span class="brand-text font-weight-light">Program Form</span> -->
        </div>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('admin/dashboard') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dashboard') : ?> active <?php endif ?>">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>