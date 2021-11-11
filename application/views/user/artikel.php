<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('user/layouts/head') ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('user/layouts/navbar') ?>
        <?php $this->load->view('user/layouts/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Artikel WEB</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-12">
                            <?php if ($this->session->flashdata('msg') != null) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('error') != null) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Artikel</h3>
                                    <button type="button" class="btn btn-success float-right" onclick="add_user()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datatables" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Isi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($artikel as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><img src="<?= base_url() ?>assets/img/artikel/<?= $data->gambar ?>" alt="" srcset=""></td>
                                                    <td><?= $data->judul ?></td>
                                                    <td><?= $data->isi ?></td>
                                                    <td class="text-center">
                                                        <button style="border-radius: 12px" type="button" class="btn btn-sm btn-info" title="Edit" onclick="edit_user('<?php echo $data->id_artikel ?>')">
                                                            <i class="fas fa-edit"></i><br>
                                                            Edit
                                                        </button>
                                                        <button style="border-radius: 12px" type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('<?= site_url('admin/User/delete/' . $data->id_artikel) ?>','<?= $data->judul ?>')">
                                                            <i class="fas fa-trash"></i><br>
                                                            Hapus
                                                        </button>
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
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <?php $this->load->view('user/layouts/footer') ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('user/layouts/script') ?>
</body>

</html>