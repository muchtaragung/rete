<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/layouts/head') ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                            <h1 class="m-0">List user</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active">List</li>
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
                        <div class="col-12">
                            <?php if ($this->session->flashdata('msg')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $this->session->flashdata('msg') ?>
                                </div>
                            <?php elseif ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('error') ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List User | Resource Therapy</h3>
                                    <div class="card-tools">
                                        <a href="<?= site_url('admin/user/add') ?>" class="btn btn-tool btn-primary bg-primary">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Kota</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($users as $user) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $user->nama ?></td>
                                                    <td><?= $user->email ?></td>
                                                    <td><?= $user->telepon ?></td>
                                                    <td><?= $user->kota ?></td>
                                                    <td><?= $user->role ?></td>
                                                    <td>
                                                        <a href="<?= site_url('admin/artikel/' . $user->id_user) ?>" class="btn btn-sm btn-success" data-toggle="tooltip" title="Artikel">
                                                            <i class="fas fa-table"></i><br>

                                                        </a>
                                                        <a href="<?= site_url('admin/user/edit/' . $user->id_user) ?>" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit">
                                                            <i class="fas fa-edit"></i><br>

                                                        </a>
                                                        <a href="<?= site_url('admin/user/delete/' . $user->id_user) ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
                                                            <i class=" fas fa-trash"></i><br>

                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
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

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
</body>

</html>