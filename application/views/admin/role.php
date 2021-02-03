<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) : ?>
                <div class="role" data-role="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="role" data-role="<?= $this->session->flashdata('flash'); ?>"></div>

            <a href="" class="btn btn-primary mb-3 tombolAddRole" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">#</th>
                        <th scope="col" class="align-middle">Role</th>
                        <th scope="col" class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                            <td class="align-middle"><?= $r['role']; ?></td>
                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning" title="access"><i class="fas fa-user-check"></i></a>
                                    <a href="<?= base_url('admin/role/') . $r['id']; ?>" class="badge badge-primary tampilRole" data-toggle="modal" data-target="#newRoleModal" data-id="<?= $r['id']; ?>" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('admin/deleterole/') . $r['id']; ?>" class="badge badge-danger tombol-hapusrole" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
                                </h4>
                                <!-- <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a> -->
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
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/role'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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