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
                            <p class="card-text col-sm-7"><?= $kdKelompokId['kelompok']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Tanggal Surat</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['tgl_surat']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Lemari</p>
                            <p class="card-text col-sm-7"><?= $kdLemariId['lemari']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Kotak</p>
                            <p class="card-text col-sm-7"><?= $kdKotakId['kotak']; ?></p>
                        </div>
                        <div class="form-group row">
                            <p class="card-text col-sm-5" for="title">Deskripsi</p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['deskripsi']; ?></p>
                        </div>

                        <div class="form-group row">
                        <p class="card-text col-sm-5" for="image">
                            File Arsip
                        </p>
                            <p class="card-text col-sm-7"><?= $tbl_dokuments['image']; ?></p>
                            <!-- <div class="custom-file col-form-label col-form-label-sm">
                                <p class="card-text col-sm-7" input type="file" class="custom-file-input" id="image" name="image">
                                <p class="custom-file-label" for="image">Choose file</p>
                            </div> -->
                        </div>
                        </div>
                        <div class="form-group row">

                        </div>
                </div>

            </div>

            <div class="form-group row justify-content-end mt-sm-5">
                <!-- <div class="col-sm-3">
                    <a href="<?= base_url('dokuments/edit/') . $tbl_dokuments['id']; ?>" class="print btn btn-primary btn-block" role="button">Edit</a>
                </div> -->
                <div class="col-sm-3">
                    <a href="<?= base_url('assets/archives/') . $tbl_dokuments['image']; ?>" class="print btn btn-success btn-block" role="button" target="blank">Download</a>
                </div>
                <!-- <div class="col-sm-3">
                    <a href="<?= base_url('dokuments/delete/') . $tbl_dokuments['id']; ?>" class="print btn btn-danger btn-block tombol-hapus" role="button">Delete</a>
                </div> -->
            </div>
        </div>
                <!-- </form> -->
    </div>

</div>
<!-- End of Main Content -->