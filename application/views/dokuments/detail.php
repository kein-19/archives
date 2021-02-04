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
                            <p class="card-text col-sm-5" for="title">Nomor</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['nomor']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Title</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['title']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Jenis</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['jenis']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Kelompok</p>
                            <p class="card-text col-sm-7"><?= $tbl_kelompok['kelompok']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Tanggal Surat</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['tgl_surat']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Tanggal Surat</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['tgl_surat']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Lemari</p>
                            <p class="card-text col-sm-7"><?= $tbl_lemari['lemari']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Kotak</p>
                            <p class="card-text col-sm-7"><?= $tbl_kotak['kotak']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Deskripsi</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['dokuments']; ?></p>
                        </div>

<!-- 
                <div class="form-group row">
                    <p class="card-text col-sm-5" for="statussiswa">
                        Kotak
                    </p>
                    <div class="col-sm-5">
                        <?php
                        echo cmb_dinamis('kode_kotak', 'tbl_kotak', 'kotak', 'kode_kotak');
                        ?>
                    </div>
                    <?= form_error('kode_kotak', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                </div> -->


                        <!-- <div class="card float-md-right p-md-2">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_dokuments['image']; ?>" class="card-img rounded mx-auto d-block" style="width: 100px">
                            </div> -->
                        <div class="form-group row">
                        <p class="card-text col-sm-5" for="image">
                            Upload File Arsip
                        </p>
                        
                            <div class="custom-file col-form-label col-form-label-sm">
                                <p class="card-text col-sm-7" input type="file" class="custom-file-input" id="image" name="image">
                                <p class="custom-file-label" for="image">Choose file</p>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">

                        </div>
                </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-3">
                                <button type="submit" name="add" class="btn btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->