<header id="home">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('<?= base_url(); ?>assets/img/smkarchives.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <!-- <h2 class="display-4">First Slide</h2> -->
          <!-- <p class="lead">This is a description for the first slide.</p> -->
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('<?= base_url(); ?>assets/img/smkarchives1.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <!-- <h2 class="display-4">Second Slide</h2> -->
          <!-- <p class="lead">This is a description for the second slide.</p> -->
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('<?= base_url(); ?>assets/img/smkarchives2.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <!-- <h2 class="display-4">Third Slide</h2> -->
          <!-- <p class="lead">This is a description for the third slide.</p> -->
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>


<section class="info" id="info" style="background: #2e6da4; min-height: 525px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-light">
        <h2 class="mb-lg-3">Informasi Sekolah</h2>
        <p style="text-indent: 60px;" class="mb-lg-5 text-justify">Pendaftaran online dilaksanakan pada bulan Mei 2020 sampai Juli 2020, untuk mempermudah calon siswa yang akan mendaftar ke SMK MERAH PUTIH. dengan mengisi biodata diri dan akan mendapatkan Nomor Formulir yang di serahkan ke sekolah dengan menyertakan berkas-berkas yang dibutuhkan. Dengan demikian calon siswa yang telah mengisi dan menyerahkan berkas dapat dinyatakan sebagai siswa baru SMK MERAH PUTIH Tahun Ajaran 2020 - 2021.</p>

        <h4 class="mb-lg-3">Petunjuk Pendaftaran</h4>
        <ol>
          <li class="lead font-weight-normal mt-3">Buka Website SMK MERAH PUTIH</li>
          <a href="https://www.smkarchives.net" class="text-white font-weight-light">https://www.smkarchives.net</a>
          <li class="lead font-weight-normal mt-3">Isi Formulir</li>
          <p class="font-weight-light mb-0">Klik Dokuments ONLINE</p>
          <p class="font-weight-light mb-0">Isi Formulir Pendaftaran untuk dapat menerima akses masuk ke tahap selanjutnya</p>
          <li class="lead font-weight-normal mt-3">Login Siswa</li>
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
          <!-- Akhir dari Petunjuk Pendaftaran -->

      </div>
    </div>
  </div>
</section>


<!-- Daftar Calon Siswa -->
<section class="daftar-siswa bg-light">
  <div class="container">
    <div class="row col-lg-10 mx-auto pt-2 mb-4">
      <div class="col text-center">
        <h2>Daftar Dokuments</h2>
      </div>
    </div>

    <div class="row col-lg-10 mx-auto">
      <p style="text-indent: 60px;" class="mb-sm-5 text-justify">Calon siswa yang telah terdaftar bisa mencetak Formulir dan menyerahkan ke SMK MERAH PUTIH untuk divalidasi agar menjadi Siswa Baru SMK MERAH PUTIH.</p>

      <div class="row">
        <div class="col-lg">
          <form action="<?= base_url('home'); ?>" method="post">

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

      <div class="wrap-table100">
        <div class="table100">
          <h5>Results : <?= $total_rows; ?></h5>
          <table class="table table-sm">
            <thead>
              <tr class="table100-head">
                <th scope="col" class="align-middle">No</th>
                <th scope="col" class="align-middle">Nomor Formulir</th>
                <th scope="col" class="align-middle">Nama Calon Siswa</th>
                <th scope="col" class="align-middle">Asal Sekolah</th>
                <th scope="col" class="align-middle">Alamat Rumah</th>
                <th scope="col" class="align-middle">Validasi</th>
              </tr>
            </thead>
            <tbody>

              <?php if (empty($tbl_dokuments)) : ?>
                <tr>
                  <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                      data not found.
                    </div>
                  </td>
                </tr>
              <?php endif; ?>

              <?php foreach ($tbl_dokuments as $sb) : ?>
                <tr>
                  <th class="align-middle" scope="row"><?= ++$start; ?></th>
                  <td class="align-middle"><?= $sb['id_doc']; ?></td>
                  <td class="align-middle"><?= $sb['nama']; ?></td>
                  <td class="align-middle"><?= $sb['asal_sekolah']; ?></td>
                  <td class="align-middle"><?= $sb['kelurahan']; ?></td>
                  <td class="align-middle"><?= $sb['validasi']; ?></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>

          <?= $this->pagination->create_links(); ?>

        </div>

      </div>

    </div>

    <center>
      <h5 class="mt-sm-4 mb-sm-4">Apakah Anda sudah daftar? Ayo segera daftar!<br>Jika sudah daftar silahkan untuk login</h5>
    </center>

    <div class="row justify-content-center">
      <div class="btn-group btn-block col-lg-5" role="group" aria-label="Basic example">
        <a href=" <?= base_url('dokuments/registration'); ?>" class="btn btn-success" role="button">Daftar</a>
        <a href="<?= base_url('dokuments/login'); ?>" class="btn btn-primary" role="button">Login</a>
      </div>
    </div>

  </div>

</section>

<section id="galeri">
  <div class="container">
    <div class="row pt-2 mb-3">
      <div class="col text-center">
        <h2>Galeri</h2>
      </div>
    </div>
    <div class="col-md-12">
      <div class="projects-holder-3">
        <div class="projects-holder">
          <div class="row">
            <?php foreach ($tbl_images as $ti) : ?>
              <div class="col-md-4 col-sm-6 project-item mix nature">
                <div class="thumb">
                  <div class="image">
                    <a href="<?= base_url('assets/img/gallery/') . $ti['image']; ?>" data-lightbox="image-1"><img src="<?= base_url('assets/img/gallery/') . $ti['image']; ?>" class="img-thumbnail"></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <!-- <?php foreach ($tbl_images as $ti) : ?>
              <div class="col-md-4 col-sm-6 project-item mix animation">
                <div class="thumb">
                  <div class="image">
                    <a href="<?= base_url('assets/img/gallery/') . $ti['image']; ?>" data-lightbox="image-1"></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="about" class="about" style="background: #2e6da4; min-height: 550px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-light">
        <h2 class="mb-lg-3">About</h2>
        <p style="text-indent: 60px;" class="lead text-justify"><?= $tbl_profile->deskripsi ?></p>
        <p style="text-indent: 60px;" class="lead text-justify"><?= $tbl_profile->kenapa_kami ?></p>
      </div>
    </div>
  </div>
</section>


<!-- Kontak Links -->
<section id="kontak" class="text-md-left bg-dark" style="min-height: 500px;">
  <div class="container container-fluid">
    <div class="row mb-5">
      <div class="col text-center text-white">
        <h2><strong>Hubungi Kami</strong></h2>
      </div>
    </div>


    <!-- <div class="row justify-content-center"> -->
    <div class="row">
      <!-- Grid row -->

      <!-- Grid column -->
      <div class="col-lg-6 text-white mb-4">
        <h4 class="mb-sm-4"><strong>Denah Lokasi</strong></h4>
        <!-- Content -->
        <!-- <h5 class="text-uppercase">Kontak Content</h5>
          <p>Here you can use rows and columns to organize your Kontak content.</p> -->
        <div id="map">
          <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.943460678787!2d106.9288793!3d-6.2983986!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3ef21b9b64a70139!2sSekolah%20Menengah%20Kejuruan%20Merah%20Putih!5e0!3m2!1sid!2sid!4v1589416659786!5m2!1sid!2sid" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

      </div>
      <!-- Grid column -->

      <!-- <hr class="clearfix w-100 d-md-none pb-3"> -->

      <!-- <div class="col-lg-4">
        <div class="card bg-primary text-white mb-4 text-center">
          <div class="card-body">
            <h5 class="card-title">Contact Me</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div> -->

      <!-- </div> -->

      <div class="col-lg-6 text-white">
        <h4 class="mb-sm-4"><strong>Kontak</strong></h4>

        <address>
          <strong>Email</strong><br>
          <a href="mailto:#" class="text-white">kurikulummerput@gmail.com</a>
        </address>


        <address>
          <strong>Sekolah Menengah Kejuruan Merah Putih</strong><br>
          Jl. Pasar Kecapi A No.2, RT.003/RW.013, Jatirahayu, Kec. Pd. Melati,<br>
          Kota Bekasi, Jawa Barat 17414<br>
        </address>

        <address>
          <strong>Telepon</strong><br>
          <abbr title="Phone">P:</abbr> (021) 84901694
        </address>

        <address>
          <strong>Contact Person</strong><br>
          <div class="row">
            <p class="mb-0 col-sm-3">Bapak Yogi</p>
            <p class="mb-0">0895-3871-73886</p>
          </div>
          <div class="row">
            <p class="mb-0 col-sm-3">Ibu Evy</p>
            <p class="mb-0">0812-7837-8711</p>
          </div>
          <div class="row">
            <p class="mb-0 col-sm-3">Bapak Agus</p>
            <p class="mb-0">0812-8808-0616</p>
          </div>
        </address>

      </div>
    </div>
  </div>
</section>
<!-- Kontak Links -->