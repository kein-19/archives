<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Gallery -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Petunjuk Pendaftaran</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <ol>
                            <li class="lead font-weight-normal mt-3">Buka Website SMK MERAH PUTIH</li>
                            <a href="https://www.smkarchives.net" class="font-weight-light">https://www.smkarchives.net</a>
                            <li class="lead font-weight-normal mt-3">Isi Formulir</li>
                            <p class="font-weight-light mb-0">Klik Dokuments ONLINE</p>
                            <p class="font-weight-light mb-0">Isi Formulir Pendaftaran untuk dapat menerima akses masuk ke tahap selanjutnya</p>
                            <li class="lead font-weight-normal mt-3">Login Arsip</li>
                            <p class="font-weight-light mb-0">Jika pengisian berhasil anda akan menerima nomor formulir / kode pendaftaran</p>
                            <p class="font-weight-light mb-0">Login menggunakan <strong>nomor formulir / kode pendaftaran</strong> dan isi password dengan <strong>tanggal lahir</strong> dibalik (<strong>tahun-bulan-tanggal</strong>)</p>
                            <small>Contoh:
                                <div class="row mt-3">
                                    <p class="col-sm-3 mb-lg-0">Nomor Formulir</p>
                                    <p>: <strong>2021000</strong></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-3">Password</p>
                                    <p>: <strong>2001-01-01</strong></p>
                                </div>
                            </small>
                            <li class="lead font-weight-normal mt-3">Cetak Dokumen</li>
                            <p class="font-weight-light mb-0">Cetak Data diri yang terdapat pada My Profile, atau klik Edit Profile apabila ingin mengubah data diri.</p>
                            <li class="lead font-weight-normal mt-3">Menyerahkan Formulir</li>
                            <p class="font-weight-light mb-0">Serahkan Formulir tersebut ke sekolah beserta berkas-berkas yang di minta.</p>
                            <li class="lead font-weight-normal mt-3">Pembayaran</li>
                            <p class="font-weight-light mb-0">Biaya pendaftaran dapat di Cicil sebanyak 3x melalui Bank DKI atau langsung ke sekolah.</p>
                        </ol>

                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Sekolah -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Menu:</div>
                            <a class="dropdown-item" href="<?= base_url('user/profile'); ?>">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <img class="col-12" src="<?= base_url('assets/img/profile/') . $tbl_dokuments['image'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <h6 class="col-md-8 col-sm-9 mt-4 font-weight-bold text-dark">Nomor Formulir</h6>
                        <h6 class="col-md-4 col-sm-3 mt-4 font-weight-bold text-dark"><?= $tbl_dokuments['id_doc']; ?></h6>
                    </div>
                    <div class="row">
                        <h6 class="col-md-8 col-sm-9 font-weight-bold text-info">Status Validasi</h6>

                        <?php if ($tbl_dokuments['is_active'] == 1) : ?>
                            <h6 class="col-md-4 col-sm-3 font-weight-bold text-success">Sudah <i class="fas fa-check"></i></h6>
                        <?php elseif ($tbl_dokuments['is_active'] == 0) : ?>
                            <h6 class="col-md-4 col-sm-3 font-weight-bold text-danger">Belum <i class="fas fa-exclamation"></i></h6>
                        <?php endif; ?>
                    </div>
                    <div class="row justify-content-end">
                        <a class="btn col-md-5 col-sm-4" href="<?= base_url('user/profile'); ?>">See More</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

</div>
<!-- End of Main Content -->