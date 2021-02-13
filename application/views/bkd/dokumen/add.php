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

                    <!-- Image -->
                    <div class="col-lg-7">

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label col-form-label-sm" for="title">
                                Title
                            </label>
                            <div class="col-sm-7">
                                <input type="text" name="title" placeholder="Title" id="title" class="form-control form-control-sm" value="<?= set_value('title'); ?>">
                            </div>
                            <?= form_error('title', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                        </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="jenis">
                        Jenis
                    </label>
                    <div class="col-sm-5">
                        <?php
                        $jenis = array(
                            null => '- Silahkan Pilih -',
                            'Masuk' => 'Masuk',
                            'Keluar' => 'Keluar'
                        );
                        $pilih = array(null);
                        echo form_dropdown(
                            'jenis',
                            $jenis,
                            $pilih,
                            "class='form-control form-control-sm'"
                        );
                        ?>
                    </div>
                    <?= form_error('jenis', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                </div>


                <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="warganegara">
                        Kelompok
                    </label>
                    <div class="col-sm-5">
                        <?php
                        echo cmb_dinamis('kelompok_id', 'tbl_kelompok', 'kelompok', 'kelompok_id');
                        ?>
                    </div>
                    <?= form_error('kelompok_id', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="tempat_lahir">
                        Tanggal Surat
                    </label>
                    <div class="col-sm-5">
                        <input type="date" name="tgl_surat" placeholder="Tanggal Surat" id="tgl_surat" class="form-control form-control-sm" value="<?= set_value('tgl_surat'); ?>">
                    </div>
                    <?= form_error('tgl_surat', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="lemari">
                        Lemari
                    </label>
                    <div class="col-sm-5">
                        <?php
                        echo cmb_dinamis('kode_lemari', 'tbl_lemari', 'lemari', 'kode_lemari');
                        ?>
                    </div>
                    <?= form_error('kode_lemari', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="kotak">
                        Kotak
                    </label>
                    <div class="col-sm-5">
                        <?php
                        echo cmb_dinamis('kode_kotak', 'tbl_kotak', 'kotak', 'kode_kotak');
                        ?>
                    </div>
                    <?= form_error('kode_kotak', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label col-form-label-sm" for="deskripsi">
                        Deskripsi
                    </label>
                    <div class="col-sm-7">
                        <textarea name="deskripsi" id="deskripsi" class="form-control form-control-sm" value="<?= set_value('deskripsi'); ?>"></textarea>
                    </div>
                    <?= form_error('deskripsi', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                </div>
                

                        <!-- <div class="card float-md-right p-md-2">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_dokuments['image']; ?>" class="card-img rounded mx-auto d-block" style="width: 100px">
                            </div> -->
                        <div class="form-group row">
                        <label class="col-sm-5 col-form-label col-form-label-sm" for="image">
                            Upload File Arsip
                        </label>
                        <div class="col-sm-7">
                            <div class="custom-file col-form-label col-form-label-sm">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">

                        </div>
                </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-3">
                                <button type="submit" name="add" class="btn btn-primary btn-block">Add</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->