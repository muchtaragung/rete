<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/layouts/head') ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layouts/navbar') ?>

        <?php $this->load->view('admin/layouts/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box shadow">
                                <span class="info-box-icon bg-success"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">User</span>
                                    <span class="info-box-number"><?= $this->db->count_all_results('user'); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box shadow">
                                <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Artikel</span>
                                    <span class="info-box-number"><?= $this->db->count_all_results('artikel'); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="info-box shadow">
                                <span class="info-box-icon bg-danger"><i class="far fa-comment"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Komentar</span>
                                    <span class="info-box-number"><?= $this->db->count_all_results('comment'); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <?php $this->load->view('admin/layouts/footer') ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('admin/layouts/script') ?>
</body>

</html>