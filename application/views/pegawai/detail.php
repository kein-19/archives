<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <h1 class="col-md-10 ml-md-4 font-weight-bold text-primary align-self-md-center p-2"><?= $title; ?></h1>
            </div>
        </div>
        <div class="card-body ml-md-4">

            <div class="row">
                <div class="col-lg-12">
                    <!-- <?= form_open_multipart(''); ?> -->

                    <!-- Image -->
                    <div class="col-lg-7">
                        <div class="form-group row">
                            <p class="card-text col-sm-5">NIK</p>
                            <p class="card-text col-sm-7"><?= $tbl_pegawai['nrh']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Nama Lengkap</p>
                            <p class="card-text col-sm-7"><?= $tbl_pegawai['nama_lengkap']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Jabatan</p>
                            <p class="card-text col-sm-7"><?= $kdJabatanId['jabatan']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Status</p>
                            <p class="card-text col-sm-7"><?= $kdStatusId['status']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Role</p>
                            <?php if ($tbl_pegawai['role_id'] == 1) : ?>
                            <p class="card-text col-sm-7 ">Administrator</p>
                            <?php elseif ($tbl_pegawai['role_id'] == 2) : ?>
                            <p class="card-text col-sm-7 ">Pegawai</p>
                            <?php elseif ($tbl_pegawai['role_id'] == 3) : ?>
                            <p class="card-text col-sm-7 ">Badan Kepegawaian Daerah</p>
                            <?php endif; ?>
                            <!-- <p class="card-text col-sm-7"><?= $tbl_pegawai['role_id']; ?></p> -->
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Email</p>
                            <p class="card-text col-sm-7"><?= $tbl_pegawai['email']; ?></p>
                        </div>

                        <!-- <div class="form-group row">
                        <p class="card-text col-sm-5" for="image">
                            File Arsip
                        </p>
                            <p class="card-text col-sm-7"><?= $tbl_pegawai['image']; ?></p> -->
                            <!-- <div class="custom-file col-form-label col-form-label-sm">
                                <p class="card-text col-sm-7" input type="file" class="custom-file-input" id="image" name="image">
                                <p class="custom-file-label" for="image">Choose file</p>
                            </div> -->
                        <!-- </div> -->
                        <!-- </div> -->
                        <!-- <div class="form-group row">

                        </div> -->
                    </div>
                </div>

            </div>

            <div class="form-group row justify-content-end mt-sm-5">
                <div class="col-sm-3">
                    <a href="<?= base_url('pegawai/edit/') . $tbl_pegawai['id_pegawai']; ?>" class="print btn btn-primary btn-block" role="button">Edit</a>
                </div>
                <!-- <div class="col-sm-3">
                    <a href="<?= base_url('assets/archives/') . $tbl_pegawai['image']; ?>" class="print btn btn-success btn-block" role="button" target="blank">Download</a>
                </div> -->
                <div class="col-sm-3">
                    <a href="<?= base_url('pegawai/delete/') . $tbl_pegawai['id_pegawai']; ?>" class="print btn btn-danger btn-block tombol-hapus" role="button">Delete</a>
                </div>
            </div>
        </div>
                <!-- </form> -->
    </div>

</div>
<!-- End of Main Content -->