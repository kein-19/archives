<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="submenu" data-submenu="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="submenu" data-submenu="<?= $this->session->flashdata('flash'); ?>"></div>

            <button type="button" class="btn btn-primary mb-3 tombolAddSubMenu" data-toggle="modal" data-target="#newSubMenuModal">
                Add New Submenu
            </button>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">#</th>
                        <th scope="col" class="align-middle">Title</th>
                        <th scope="col" class="align-middle">Menu</th>
                        <th scope="col" class="align-middle">Url</th>
                        <th scope="col" class="align-middle">Icon</th>
                        <th scope="col" class="align-middle">Active</th>
                        <th scope="col" class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                            <td class="align-middle"><?= $sm['title']; ?></td>
                            <td class="align-middle"><?= $sm['menu']; ?></td>
                            <td class="align-middle"><?= $sm['url']; ?></td>
                            <td class="align-middle"><?= $sm['icon']; ?></td>
                            <td class="align-middle"><?= $sm['is_active']; ?></td>
                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('menu/submenu/') . $sm['id']; ?>" class="badge badge-primary tampilSubMenu" data-toggle="modal" data-target="#newSubMenuModal" data-id="<?= $sm['id']; ?>" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('menu/deletesubmenu/') . $sm['id']; ?>" class="badge badge-danger tombol-hapussubmenu" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/submenu'); ?>" method="post">

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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