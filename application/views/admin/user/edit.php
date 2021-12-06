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
                    <form action="<?= site_url('admin/user/update') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-lg-8">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required value="<?= $user->nama ?>">
                                <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Slug" required value="<?= $user->slug ?>">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required value="<?= $user->email ?>">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="">Ganti Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <option value="trainer" <?php if ($user->role == 'trainer') { ?>selected <?php } ?>>Trainer</option>
                                    <option value="therapist" <?php if ($user->role == 'therapist') { ?>selected <?php } ?>>Therapist</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="">Ganti Foto</label>
                                <input type="file" name="foto" class="form-control" placeholder="Foto" id="preview_gambar" accept=".jpg,.jpeg,.png">
                                <img width="100%" src="<?= base_url('assets/img/user/' . $user->foto) ?>" alt="" id="gambar_load" class="img-circle mt-1">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="">Telepon</label>
                                <input type="text" name="telepon" class="form-control" placeholder="0812828182" required value="<?= $user->telepon ?>">
                            </div>
                            <div class=" form-group col-lg-5">
                                <label for="">Kota</label>
                                <input type="text" name="kota" class="form-control" placeholder="Kota" required value="<?= $user->kota ?>">
                            </div>

                            <div class=" form-group col-lg-12">
                                <label for="">Profil Biodata</label>
                                <textarea name="profil" id="" cols="30" rows="5" class="form-control"><?= $user->profil ?></textarea>
                            </div>

                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
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

        function bacaGambar(input) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }

        $("#preview_gambar").change(function() {
            bacaGambar(this);
        });
    </script>
</body>

</html>