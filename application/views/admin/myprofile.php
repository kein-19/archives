<div class="container-fluid">

            <div class="row">
                <div class="col-10 align-self-lg-center">
                    <div class="row">
                        <div class="col-9 align-self-sm-center">
                                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                            <div class="row">
                                <div class="col-lg-8">
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                            <p class="card-text col-sm-5">NIK</p>
                            <p class="card-text col-sm-7"><?= $tbl_user['nik']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Nama Lengkap</p>
                            <p class="card-text col-sm-7"><?= $tbl_user['nama_lengkap']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Jabatan</p>
                            <p class="card-text col-sm-7"><?= $kdJabatan['jabatan']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Status</p>
                            <p class="card-text col-sm-7"><?= $kdStatus['status']; ?></p>
                        </div>
                        <!-- <div class="form-group row">
                            <p class="card-text col-sm-5">Role</p>
                            <?php if ($tbl_user['role_id'] == 1) : ?>
                            <p class="card-text col-sm-7 ">Administrator</p>
                            <?php elseif ($tbl_user['role_id'] == 2) : ?>
                            <p class="card-text col-sm-7 ">Pegawai</p>
                            <?php elseif ($tbl_user['role_id'] == 3) : ?>
                            <p class="card-text col-sm-7 ">Badan Kepegawaian Daerah</p>
                            <?php endif; ?>
                        </div> -->
                        <div class="form-group row">
                            <p class="card-text col-sm-5">Email</p>
                            <p class="card-text col-sm-7"><?= $tbl_user['email']; ?></p>
                        </div>
                            <!-- <div class="row">
                                <label class="col-sm-5 ">Nama</label>
                                <label class="col-sm-7 "><?= $tbl_user['nama_lengkap']; ?></label>
                            </div>
                            <div class="row">
                                <label class="col-sm-5 ">Email</label>
                                <label class="col-sm-7 "><?= $tbl_user['email']; ?></label>
                            </div>
                            <div class="row">
                                <label class="col-sm-5 ">Role</label>
                                <?php if ($tbl_user['role_id'] == 1) : ?>
                                <label class="col-sm-7 ">Administrator</label>
                                <?php elseif ($tbl_user['role_id'] == 2) : ?>
                                <label class="col-sm-7 ">Pegawai</label>
                                <?php elseif ($tbl_user['role_id'] == 3) : ?>
                                <label class="col-sm-7 ">Badan Kepegawaian Daerah</label>
                                <?php endif; ?>
                            </div> -->
                            
                        </div>
                        <div class="col-3">
                            <img src="<?= base_url('assets/img/profile/') . $tbl_user['foto']; ?>" class=" img-thumbnail ml-md-5" style="width: 150px">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-3 mt-2">
                        <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $tbl_user['date_created']); ?></small></p>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                    <div class="col-sm-3">
                    <a href="<?= base_url('user/edit/'); ?>" class="print btn btn-primary btn-block" role="button">Edit</a>
                    </div>
                    </div>
        </div>
        </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 