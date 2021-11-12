<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/layouts/head') ?>
</head>

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
                            <h1 class="m-0">Edit Artikel</h1>
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
                                <div class="card-body">
                                    <form action="<?= base_url() ?>admin/artikel/update" method="post" enctype="multipart/form-data">
                                        <div class="text-center mb-4">
                                            <img width="200px" class="image-fluid" id="image-preview" alt="image preview" src="<?= base_url('assets/img/artikel/' . $artikel->gambar) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="gambar" id="image-source" accept="image/x-png,image/jpg,image/jpeg" onchange="previewImage();">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Judul Artikel</label>
                                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" value="<?= $artikel->judul ?>">
                                            <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="">Isi Artikel</label>
                                            <textarea name="isi" id="summernote" class="form-control" placeholder="Isi"><?= $artikel->isi ?></textarea>
                                            <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                        </div>
                                        <input type="hidden" name="id_user" value="<?= $artikel->id_user ?>">
                                        <input type="hidden" name="id_artikel" value="<?= $artikel->id_artikel ?>">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
        <script>
            function previewImage() {
                document.getElementById("image-preview").style.display = "block";
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
                oFReader.onload = function(oFREvent) {
                    document.getElementById("image-preview").src = oFREvent.target.result;
                };
            };
        </script>
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