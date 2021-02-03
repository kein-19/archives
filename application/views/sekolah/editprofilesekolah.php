<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-3">

        <div class="card-header ml-md-4">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-9 align-self-sm-center">
                            <h1 class="font-weight-bold text-primary"><?= $title; ?></h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body ml-md-4">


            <div class="row">

                <div class="col-sm-9">
                    <?= form_open_multipart(''); ?>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="deskripsi">
                            Deskripsi
                        </label>
                        <!-- <input type="text" class="form-control form-control-sm form-control form-control-sm" id="id" name="id" value="<?= $tbl_profile['id']; ?>" readonly> -->
                        <div class="col-sm-7">
                            <textarea rows="7" cols="50" name="deskripsi" id="deskripsi" class="form-control form-control-sm"><?= $tbl_profile['deskripsi']; ?></textarea>
                        </div>
                        <?= form_error('deskripsi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="kenapa_kami">
                            Kenapa memilih kami ?
                        </label>
                        <div class="col-sm-7">
                            <textarea rows="7" cols="50" name="kenapa_kami" id="kenapa_kami" class="form-control form-control-sm"><?= $tbl_profile['kenapa_kami']; ?></textarea>
                        </div>
                        <?= form_error('kenapa_kami', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                    </div>


                </div>

                <!-- Image -->
                <div class="col-sm-3">
                    <!-- <div class="card float-md-right p-md-2">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_siswa['image']; ?>" class="card-img rounded mx-auto d-block" style="width: 100px">
                            </div> -->
                    <div class="row">
                        <img src="<?= base_url('assets/img/profile/') . $tbl_profile['image']; ?>" class="img-thumbnail mb-sm-3 p-sm-2">
                        <div class="custom-file col-form-label col-form-label-sm">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-group row mt-sm-5 p-sm-2">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="visi">
                    Visi
                </label>
                <div class="col-sm-7">
                    <textarea rows="7" cols="50" name="visi" id="visi" class="form-control form-control-sm"><?= $tbl_profile['visi']; ?></textarea>
                </div>
                <?= form_error('visi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="misi">
                    Misi
                </label>
                <div class="col-sm-7">
                    <textarea rows="7" cols="50" name="misi" id="misi" class="form-control form-control-sm"><?= $tbl_profile['misi']; ?></textarea>
                </div>
                <?= form_error('misi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
            </div>

            <hr>

            <h3 class="h3 text-gray-900 mt-sm-5 mb-sm-3">Profile</h3>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="nama_sekolah">
                    Nama Sekolah
                </label>
                <div class="col-sm-7">
                    <input type="text" name="nama_sekolah" placeholder="Nama Sekolah" id="nama_sekolah" class="form-control form-control-sm" value="<?= $tbl_profile['nama_sekolah']; ?>">
                </div>
                <?= form_error('nama_sekolah', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>


            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="akreditasi">
                    Akreditasi
                </label>
                <div class="col-sm-7">
                    <input type="text" name="akreditasi" placeholder="Akreditasi" id="akreditasi" class="form-control form-control-sm" value="<?= $tbl_profile['akreditasi']; ?>">
                </div>
                <?= form_error('akreditasi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="nomor_ijin">
                    Nomor Ijin
                </label>
                <div class="col-sm-7">
                    <input type="text" name="nomor_ijin" placeholder="Nomor Ijin" id="nomor_ijin" class="form-control form-control-sm" value="<?= $tbl_profile['nomor_ijin']; ?>">
                </div>
                <?= form_error('nomor_ijin', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="tgl_berdiri">
                    Tanggal Berdiri
                </label>
                <div class="col-sm-3">
                    <input type="date" name="tgl_berdiri" placeholder="Tanggal Lahir" id="tgl_berdiri" class="form-control form-control-sm" value="<?= $tbl_profile['tgl_berdiri']; ?>">
                </div>
                <?= form_error('tgl_berdiri', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="alamat">
                    Alamat
                </label>
                <div class="col-sm-7">
                    <textarea rows="7" cols="50" name="alamat" id="alamat" class="form-control form-control-sm"><?= $tbl_profile['alamat']; ?></textarea>
                </div>
                <?= form_error('alamat', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="telp">
                    Telephone
                </label>
                <div class="col-sm-7">
                    <input type="text" name="telp" placeholder="Telephone" id="telp" class="form-control form-control-sm" value="<?= $tbl_profile['telp']; ?>">
                </div>
                <?= form_error('telp', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="fax">
                    Fax
                </label>
                <div class="col-sm-7">
                    <input type="text" name="fax" placeholder="Fax" id="fax" class="form-control form-control-sm" value="<?= $tbl_profile['fax']; ?>">
                </div>
                <?= form_error('fax', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="email">
                    Email
                </label>
                <div class="col-sm-7">
                    <input type="text" name="email" placeholder="Email" id="email" class="form-control form-control-sm" value="<?= $tbl_profile['email']; ?>">
                </div>
                <?= form_error('email', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="status_sekolah">
                    Sekolah
                </label>
                <div class="col-sm-7">
                    <input type="text" name="status_sekolah" placeholder="Sekolah" id="status_sekolah" class="form-control form-control-sm" value="<?= $tbl_profile['status_sekolah']; ?>">
                </div>
                <?= form_error('status_sekolah', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label col-form-label-sm" for="yayasan">
                    Yayasan
                </label>
                <div class="col-sm-7">
                    <input type="text" name="yayasan" placeholder="Yayasan" id="yayasan" class="form-control form-control-sm" value="<?= $tbl_profile['yayasan']; ?>">
                </div>
                <?= form_error('yayasan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-2">
                    <button type="submit" name="edit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>

            </form>

        </div>

        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->