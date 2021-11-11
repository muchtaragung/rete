<style>
    #hover-red:hover {
        background-color: red;
    }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="#" class="brand-link">
        <div class="shadow-none p-3 mb-1 bg-light rounded">
            <img width="100%" class="img-fluid" src="<?= site_url('assets/') ?>img/logo/logo_rt.png" alt="Logo">
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
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('admin/user/list') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'user') : ?> active <?php endif ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            List User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('logout') ?>" class="nav-link" id='hover-red'>
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->



    </div>
    <!-- /.sidebar -->
</aside>