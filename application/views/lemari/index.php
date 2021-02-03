<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="lemari" data-lemari="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="lemari" data-lemari="<?= $this->session->flashdata('flash'); ?>"></div>


            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->

            <a href="" class="btn btn-primary mb-3 tombolAddLemari" data-toggle="modal" data-target="#newLemariModal">Add New Lemari</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">#</th>
                        <th scope="col" class="align-middle">Kode Lemari</th>
                        <th scope="col" class="align-middle">Nama Lemari</th>
                        <th scope="col" class="align-middle">Lokasi</th>
                        <th scope="col" class="align-middle">Ruangan</th>
                        <th scope="col" class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lemari as $k) : ?>
                        <tr>
                            <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                            <td class="align-middle"><?= $k['kode_lemari']; ?></td>
                            <td class="align-middle"><?= $k['lemari']; ?></td>
                            <td class="align-middle"><?= $k['lokasi']; ?></td>
                            <td class="align-middle"><?= $k['ruangan']; ?></td>
                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('lemari/') . $k['id_lemari']; ?>" class="badge badge-primary tampilLemari" data-toggle="modal" data-target="#newLemariModal" data-id_lemari="<?= $k['id_lemari']; ?>" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('lemari/delete/') . $k['id_lemari']; ?>" class="badge badge-danger tombol-hapuslemari" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="newLemariModal" tabindex="-1" role="dialog" aria-labelledby="newLemariModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newLemariModalLabel">Add New Lemari</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('lemari'); ?>" method="post">
                    <input type="hidden" name="id_lemari" id="id_lemari">
                    <!-- <input type="hidden" name="lemari_id" id="lemari_id"> -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="lemari" name="lemari" placeholder="Nama Lemari">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan">
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