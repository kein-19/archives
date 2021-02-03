<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-3">

        <div class="card-header ml-md-4">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-9 align-self-sm-center">
                            <h1 class="font-weight-bold text-primary"><?= $title; ?></h1>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body ml-md-4">


            <?php if (validation_errors()) : ?>
                <div class="menu" data-menu="<?= validation_errors(); ?>"></div>
            <?php endif; ?>

            <div class="menu" data-menu="<?= $this->session->flashdata('flash'); ?>"></div>


            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->


            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-9 align-self-sm-center">
                            <p><?= $tbl_profile['deskripsi']; ?></p>
                            <br>
                            <h4><strong>Kenapa memilih kami ?</strong></h4>
                            <p><?= $tbl_profile['kenapa_kami']; ?></p>

                        </div>
                        <div class="col-3">
                            <img src="<?= base_url('assets/img/profile/') . $tbl_profile['logo']; ?>" class=" img-thumbnail ml-md-5" style="width: 150px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">

                    <div class="row">
                        <div class="jumbotron mt-5">

                            <!-- end of user messages -->
                            <ul class="messages">
                                <li>
                                    <div class="row">
                                        <h4 class="display-4">Visi</h4>
                                        <blockquote style="margin-left:50px;" class="blockquote"><?= $tbl_profile['visi']; ?></blockquote>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <h4 class="display-4">Misi</h4>
                                        <blockquote style="margin-left:50px;" class="blockquote"><?= $tbl_profile['misi']; ?></blockquote>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <h4 class="display-4">MOTTO</h4>
                                        <blockquote style="margin-left:50px;" class="blockquote"><?= $tbl_profile['motto']; ?></blockquote>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of user messages -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">

                    <table style="font-size: 15px" class="table table-striped">
                        <h2 style="text-align: center">Profile</h2>
                        <tbody>
                            <tr>
                                <th scope="row">Nama Sekolah</th>
                                <td>:</td>
                                <td><?= $tbl_profile['nama_sekolah']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Akreditasi</th>
                                <td>:</td>
                                <td><?= $tbl_profile['akreditasi']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Ijin</th>
                                <td>:</td>
                                <td><?= $tbl_profile['nomor_ijin']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Berdiri</th>
                                <td>:</td>
                                <td><?= $tbl_profile['tgl_berdiri']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td><?= $tbl_profile['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Telephone</th>
                                <td>:</td>
                                <td><?= $tbl_profile['telp']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Fax</th>
                                <td>:</td>
                                <td><?= $tbl_profile['fax']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>:</td>
                                <td><?= $tbl_profile['email']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Sekolah</th>
                                <td>:</td>
                                <td><?= $tbl_profile['status_sekolah']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Yayasan</th>
                                <td>:</td>
                                <td><?= $tbl_profile['yayasan']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="text-center mtop20">
                <a href="<?= base_url('sekolah/editprofilesekolah/') . $tbl_profile['id']; ?>" class="btn btn-primary mb-3" role="button" title="edit">Edit Profile Sekolah</a>

            </div>

        </div>

        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->