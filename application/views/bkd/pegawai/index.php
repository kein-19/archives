<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-sm-12">

            <!-- Daftar  Arsip -->

            <div class="col-sm-12 mx-auto">
                <div class="flash-pegawai" data-flashpegawai="<?= $this->session->flashdata('flash'); ?>"></div>

                <div class="row mt-3 mb-2">
                    <!-- <div class="col-md-4">
                        <a href="<?= base_url('pegawai/add'); ?>" class="btn btn-primary">Tambah Data Dokuments</a>
                    </div> -->

                    <div class="col-md-2">
                        <h5 class="mt-2 mb-2">Results : <?= $total_rows; ?></h5>
                    </div>

                    <div class="col-md-6">
                        <form action="<?= base_url('data_pegawai'); ?>" method="post">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search keyword.." name="keyword" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input class="btn btn-primary fas fa-search" type="submit" name="submit">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <table class="table table-sm table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="align-middle text-center">No</th>
                            <th scope="col" class="align-middle">NRH</th>
                            <th scope="col" class="align-middle">Nama Lengkap</th>
                            <th scope="col" class="align-middle">Email</th>
                            <th scope="col" class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (empty($tbl_pegawai)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-danger" role="alert">
                                        data not found.
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($tbl_pegawai as $sb) : ?>

                            <tr>
                                <th class="align-middle text-center" scope="row"><?= ++$start; ?></th>
                                <td class="align-middle"><?= $sb['nrh']; ?></td>
                                <td class="align-middle"><?= $sb['nama_lengkap']; ?></td>
                                <td class="align-middle"><?= $sb['email']; ?></td>
                                
                                <td class="align-middle text-center">
                                    <h4><a href="<?= base_url('pegawai/detail/') . $sb['id_pegawai']; ?>" class="badge badge-secondary" role="button" title="detail"><i class="far fa-fw fa-id-card"></i></a>
                                        <!-- <a href="<?= base_url('pegawai/edit/') . $sb['id_pegawai']; ?>" class="badge badge-primary" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a> -->
                                        <!-- <a href="<?= base_url('assets/archives/') . $sb['image']; ?>" class="badge badge-success" role="button" target="blank" title="download"><i class="fas fa-fw fa-download"></i></a> -->
                                        <!-- <a href="<?= base_url('pegawai/delete/') . $sb['id_pegawai']; ?>" class="badge badge-danger tombol-hapuspegawai" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a></h4> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                <?= $this->pagination->create_links(); ?>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->