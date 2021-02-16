<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('bkd/edit'); ?>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label" for="email">
                    Email
                </label>
                <div class="col-sm-7">
                    <input type="text" name="email" placeholder="Email" id="email" class="form-control form-control-sm" value="<?= $tbl_user['email']; ?>" readonly>
                </div>
                <!-- <?= form_error('email', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?> -->
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label" for="nama_lengkap">
                    Nama Lengkap
                </label>
                <div class="col-sm-7">
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" id="nama_lengkap" class="form-control form-control-sm" value="<?= $tbl_user['nama_lengkap']; ?>">
                </div>
                <?= form_error('nama_lengkap', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
            </div>
            <!-- <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="jabatan">
                        Jabatan
                    </label>
                    <div class="col-sm-5">
                        <?php
                        echo cmb_dinamis('kode_jabatan', 'tbl_jabatan', 'jabatan', 'kode_jabatan');
                        ?>
                    </div>
                    <?= form_error('kode_jabatan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>
            
            <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="status">
                        Status
                    </label>
                    <div class="col-sm-5">
                        <?php
                        echo cmb_dinamis('kode_status', 'tbl_status', 'status', 'kode_status');
                        ?>
                    </div>
                    <?= form_error('kode_status', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div> -->
            <!-- <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label" for="role_id">
                        Role
                    </label>
                    <div class="col-sm-5">
                        <?php
                        $role_id = array(
                            null => '- Silahkan Pilih -',
                            1 => 'Administrator',
                            2 => 'Pegawai',
                            3 => 'Badan Kepegawaian Daerah'
                        );
                        $pilih = $tbl_user['role_id'];
                        echo form_dropdown(
                            'role_id',
                            $role_id,
                            $pilih,
                            "class='form-control form-control-sm'"
                        );
                        ?>
                    </div>
                    <?= form_error('role_id', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                    <?php if ($tbl_user['role_id'] == 1) : ?>
                    <i class="col-form-label col-form-label"></i>
                    <?php elseif ($tbl_user['role_id'] == 2) : ?>
                    <i class="col-form-label col-form-label"></i>
                    <?php elseif ($tbl_user['role_id'] == 3) : ?>
                    <i class="col-form-label col-form-label"></i>
                    <?php endif; ?>
                </div> -->
            <div class="form-group row">
            <label class="col-sm-5 col-form-label col-form-label" for="foto">
                    Foto
            </label>
            <div class="col-sm-7">
                <img src="<?= base_url('assets/img/profile/') . $tbl_user['foto'] ?>" class="img-thumbnail mb-sm-3 p-sm-2">
                <div class="custom-file col-form-label col-form-label-sm">
                    <input type="file" class="custom-file-input" id="foto" name="foto">
                    <label class="custom-file-label" for="foto"><?= $tbl_user['foto']; ?></label>
                </div>
            </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-4">
                    <button type="submit" name="edit" class="btn btn-primary btn-block">Edit</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 