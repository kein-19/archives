<div class="jumbotron daftar luhur">

    <div class="col-md-8 mx-auto">

        <h1 style="color:rgb(252, 252, 252)" class="font-weight-bold mt-4 mb-3">
            <center><?= $title; ?></center>
        </h1>

        <table style="font-size: 15px" class="table table-striped">

            <tbody>
                <tr>
                    <th scope="row">Nama Sekolah</th>
                    <td>:</td>
                    <td><?= $tbl_profile->nama_sekolah ?></td>
                </tr>
                <tr>
                    <th scope="row">Akreditasi</th>
                    <td>:</td>
                    <td><?= $tbl_profile->akreditasi ?></td>
                </tr>
                <tr>
                    <th scope="row">Nomor Ijin</th>
                    <td>:</td>
                    <td><?= $tbl_profile->nomor_ijin ?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Berdiri</th>
                    <td>:</td>
                    <td><?= $tbl_profile->tgl_berdiri ?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>:</td>
                    <td><?= $tbl_profile->alamat ?></td>
                </tr>
                <tr>
                    <th scope="row">Telephone</th>
                    <td>:</td>
                    <td><?= $tbl_profile->telp ?></td>
                </tr>
                <tr>
                    <th scope="row">Fax</th>
                    <td>:</td>
                    <td><?= $tbl_profile->fax ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>:</td>
                    <td><?= $tbl_profile->email ?></td>
                </tr>
                <tr>
                    <th scope="row">Sekolah</th>
                    <td>:</td>
                    <td><?= $tbl_profile->status_sekolah ?></td>
                </tr>
                <tr>
                    <th scope="row">Yayasan</th>
                    <td>:</td>
                    <td><?= $tbl_profile->yayasan ?></td>
                </tr>
            </tbody>
        </table>
    </div>


</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-3">

        <div class="card-header ml-md-4">
            <div class="row">
                <div class="col-12 align-self-sm-center">
                    <center>
                        <h1><?= $visi_misi; ?></h1>
                    </center>
                </div>
            </div>
        </div>

        <div class="card-body ml-md-4">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="jumbotron mt-5">

                            <!-- end of user messages -->
                            <ul class="messages">
                                <li>
                                    <div class="row">
                                        <h4 class="display-8">Visi</h4>
                                    </div>
                                    <h6><?= $tbl_profile->visi ?></h6><br>
                                </li>
                                <li>
                                    <div class="row">
                                        <h4 class="display-8">Misi</h4>
                                    </div>
                                    <h6 style="line-height:2"><?= nl2br($tbl_profile->misi, false) ?></h6><br>
                                </li>
                            </ul>
                            <!-- end of user messages -->
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->