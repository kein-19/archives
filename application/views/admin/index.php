<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Keterangan Dokuments -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-x font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL DOKUMENTS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_rows; ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <a href="<?= base_url('dokuments'); ?>"><i class="fas fa-users fa-2x text-gray-300"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keterangan SISWA -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-x font-weight-bold text-success text-uppercase mb-1">
                                TOTAL PEGAWAI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pegawai; ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <a href="<?= base_url('siswa'); ?>"><i class="fas fa-user-check fa-2x text-gray-300"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Gallery -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">GALLERY</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Menu:</div>
                            <!-- <a class="dropdown-item" href="<?= base_url('gallery/'); ?>">See More</a> -->
                            <!-- <a class="dropdown-item" href="<?= base_url('gallery/addimage'); ?>">Add New Image</a> -->
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($tbl_images as $ti) : ?>
                            <div class="col-md-4 col-sm-6 project-item mix nature">
                                <div class="thumb">
                                    <div class="image">
                                        <img src="<?= base_url('assets/img/gallery/') . $ti['image']; ?>" class="img-thumbnail mb-4">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Sekolah -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">PROFILE SEKOLAH</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Menu:</div>
                            <a class="dropdown-item" href="<?= base_url('sekolah/'); ?>">See More</a>
                            <a class="dropdown-item" href="<?= base_url('sekolah/editprofilesekolah/1'); ?>">Edit Profile Sekolah</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <center>
                            <div class="col-sm-12">
                                <img src="<?= base_url('assets/img/profile/') . $tbl_profile->image ?>">
                            </div>
                        </center>
                    </div>
                    <div class="row">
                        <center>
                            <div class="mt-3 text-gray small mb-4"><?= $tbl_profile->visi ?></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->