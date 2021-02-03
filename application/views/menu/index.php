<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) : ?>
                <div class="menu" data-menu="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="menu" data-menu="<?= $this->session->flashdata('flash'); ?>"></div>


            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->

            <a href="" class="btn btn-primary mb-3 tombolAddMenu" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">#</th>
                        <th scope="col" class="align-middle">Menu</th>
                        <th scope="col" class="align-middle">Icon</th>
                        <th scope="col" class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                            <td class="align-middle"><?= $m['menu']; ?></td>
                            <td class="align-middle"><?= $m['menu_icon']; ?></td>
                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('menu/') . $m['id']; ?>" class="badge badge-primary tampilMenu" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $m['id']; ?>" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('menu/delete/') . $m['id']; ?>" class="badge badge-danger tombol-hapusmenu" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu_icon" name="menu_icon" placeholder="Menu icon">
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