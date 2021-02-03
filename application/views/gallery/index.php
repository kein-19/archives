<div class="container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h1><?= $title; ?></h1>
        </div>

        <div class="row mt-3 mb-2">
            <div class="col-md-4">
                <a href="<?= base_url('gallery/addimage'); ?>" class="btn btn-primary">Add New Image</a>
            </div>

            <div class="col-md-2">
                <h5 class="mt-2 mb-2">Results : <?= $total_rows; ?></h5>
            </div>

            <div class="col-md-6">
                <form action="<?= base_url('gallery'); ?>" method="post">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search keyword.." name="keyword" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-primary fas fa-search" type="submit" name="submit">
                            <!-- <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i></button> -->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="flash-gambar" data-flashgambar="<?= $this->session->flashdata('flash'); ?>"></div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th width="200">Thumbnail</th>
                        <th>Title</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (empty($tbl_images)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert">
                                    data not found.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($tbl_images as $ti) : ?>

                        <tr>
                            <th class="align-middle text-center" scope="row"><?= ++$start; ?></th>
                            <td>
                                <div class="thumbnail">
                                    <img width="200" src="<?= base_url('assets/img/gallery/') . $ti['image']; ?>" alt="Image 1">
                                </div>
                            </td>
                            <!-- <td class="align-middle"><?= $ti['id']; ?></td> -->
                            <!-- <td class="align-middle"></td> -->
                            <td class="align-middle"><?= $ti['title']; ?></td>


                            <td class="align-middle text-center">
                                <h4>
                                    <a href="<?= base_url('gallery/editimage/') . $ti['id']; ?>" class="badge badge-primary" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="<?= base_url('gallery/deleteimage/') . $ti['id']; ?>" class="badge badge-danger tombol-hapusgallery" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a></h4>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>

</div>