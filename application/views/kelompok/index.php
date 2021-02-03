<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) : ?>
                <div class="kelompok" data-kelompok="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="kelompok" data-kelompok="<?= $this->session->flashdata('flash'); ?>"></div>


            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->

            <a href="" class="btn btn-primary mb-3 tombolAddKelompok" data-toggle="modal" data-target="#newKelompokModal">Add New Kelompok</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">#</th>
                        <th scope="col" class="align-middle">Nama Kelompok</th>
                        <th scope="col" class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelompok as $k) : ?>
                        <tr>
                            <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                            <td class="align-middle"><?= $k['kelompok']; ?></td>
                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('kelompok/') . $k['id']; ?>" class="badge badge-primary tampilKelompok" data-toggle="modal" data-target="#newKelompokModal" data-id="<?= $k['id']; ?>" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('kelompok/delete/') . $k['id']; ?>" class="badge badge-danger tombol-hapuskelompok" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="newKelompokModal" tabindex="-1" role="dialog" aria-labelledby="newKelompokModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKelompokModalLabel">Add New Kelompok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kelompok'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <!-- <input type="hidden" name="kelompok_id" id="kelompok_id"> -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="Kelompok name">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="menu_icon" name="menu_icon" placeholder="Kelompok icon">
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>