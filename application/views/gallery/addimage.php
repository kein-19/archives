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
                        <!-- <div class="card float-md-right p-md-2">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_dokuments['image']; ?>" class="card-img rounded mx-auto d-block" style="width: 100px">
                            </div> -->
                        <div class="row mb-sm-3 p-sm-2">
                            <img src="<?= base_url('assets/img/gallery/default-img.png') ?>" class="img-thumbnail mb-sm-3 p-sm-2">
                            <div class="custom-file col-form-label col-form-label-sm">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-4">
                                <button type="submit" name="add" class="btn btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->