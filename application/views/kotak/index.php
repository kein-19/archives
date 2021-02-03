<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="kotak" data-kotak="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="kotak" data-kotak="<?= $this->session->flashdata('flash'); ?>"></div>


            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->

            <a href="" class="btn btn-primary mb-3 tombolAddKotak" data-toggle="modal" data-target="#newKotakModal">Add New Kotak</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">#</th>
                        <th scope="col" class="align-middle">Kode Kotak</th>
                        <th scope="col" class="align-middle">Nama Kotak</th>
                        <th scope="col" class="align-middle">Lemari</th>
                        <th scope="col" class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kdLemari as $k) : ?>
                        <tr>
                            <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                            <td class="align-middle"><?= $k['kode_kotak']; ?></td>
                            <td class="align-middle"><?= $k['kotak']; ?></td>
                            <td class="align-middle"><?= $k['lemari']; ?></td>
                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('kotak/') . $k['id_kotak']; ?>" class="badge badge-primary tampilKotak" data-toggle="modal" data-target="#newKotakModal" data-id_kotak="<?= $k['id_kotak']; ?>" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('kotak/delete/') . $k['id_kotak']; ?>" class="badge badge-danger tombol-hapuskotak" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
                                </h4>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newKotakModal" tabindex="-1" role="dialog" aria-labelledby="newKotakModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKotakModalLabel">Add New Kotak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kotak'); ?>" method="post">
                    <input type="hidden" name="id_kotak" id="id_kotak">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kotak" name="kotak" placeholder="Nama Kotak">
                    </div>
                    <!-- <div class="form-group">
                        <?php
                        echo cmb_dinamis('kode_lemari', 'tbl_lemari', 'lemari', 'kode_lemari');
                        ?>
                    </div> -->
                    <div class="form-group">
                        <select name="kode_lemari" id="kode_lemari" class="form-control">
                            <option value="">Select Lemari</option>
                            <?php foreach ($kdLemari as $l) : ?>
                                <option value="<?= $l['kode_lemari']; ?>"><?= $l['lemari']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>