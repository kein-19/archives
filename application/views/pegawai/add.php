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
                    <?= form_open_multipart(''); ?>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="nama_lengkap">
                                    Nama Lengkap
                                </label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap'); ?>">
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
    
                            <div class="form-group row">
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
                                    <label class="col-sm-5 col-form-label col-form-label-sm" for="divisi">
                                        Divisi
                                    </label>
                                    <div class="col-sm-5">
                                        <?php
                                        echo cmb_dinamis('kode_divisi', 'tbl_divisi', 'divisi', 'kode_divisi');
                                        ?>
                                    </div>
                                    <?= form_error('kode_divisi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="role_id">
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
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'role_id',
                                        $role_id,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('role_id', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="email">
                                    Email
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            
                            <div class="row justify-content-end">
                                <div class="col-lg-5">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Add
                                    </button>
                                    <!-- <button type="submit" name="add" class="btn btn-primary btn-block">Add</button> -->
                                </div>
                            </div>                    

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->