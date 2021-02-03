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
          <p class="font-weight-light mb-0">Klik dokuments ONLINE</p>
          <p class="font-weight-light mb-0">Isi Formulir Pendaftaran untuk dapat menerima akses masuk ke tahap selanjutnya</p>
          <li class="lead font-weight-normal mt-3">Login Siswa</li>
          <p class="font-weight-light mb-0">Jika pengisian berhasil anda akan menerima nomor formulir / kode pendaftaran</p>
          <p class="font-weight-light mb-0">Login menggunakan <strong>nomor formulir / kode pendaftaran</strong> dan isi password dengan <strong>tanggal lahir</strong> dibalik (<strong>tahun-bulan-tanggal</strong>)</p>
          <small>Contoh:
            <table>
              <tr>
                <td>Nomor Formulir</td>
                <td>: <strong>20-21-dokuments-05110001</strong></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>: <strong>2001-01-01</strong></td>
              </tr>
            </table>
          </small>
          <li class="lead font-weight-normal mt-3">Cetak Dokumen</li>
          <p class="font-weight-light mb-0">Cetak Data diri yang terdapat pada My Profile, atau klik Edit Profile apabila ingin mengubah data diri.</p>
          <li class="lead font-weight-normal mt-3">Menyerahkan Formulir</li>
          <p class="font-weight-light mb-0">Serahkan Formulir tersebut ke sekolah beserta berkas-berkas yang di minta.</p>
          <li class="lead font-weight-normal mt-3">Pembayaran</li>
          <p class="font-weight-light mb-0">Biaya pendaftaran dapat di Cicil sebanyak 3x melalui Bank DKI atau langsung ke sekolah.</p>

          <!-- Akhir dari Petunjuk Pendaftaran -->

      </div>
    </div>
  </div>
</section>


<!-- berita -->
<section class="berita bg-light">
  <div class="container">
    <div class="row pt-2 mb-4">
      <div class="col text-center">
        <h2>Berita Utama</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="<?= base_url(); ?>assets/img/thumbs/1.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Read More &raquo</a>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="<?= base_url(); ?>assets/img/thumbs/2.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Read More &raquo</a>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="<?= base_url(); ?>assets/img/thumbs/3.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Read More &raquo</a>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="<?= base_url(); ?>assets/img/thumbs/4.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Read More &raquo</a>
          </div>
        </div>
      </div>
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="<?= base_url(); ?>assets/img/thumbs/5.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Read More &raquo</a>

          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="<?= base_url(); ?>assets/img/thumbs/6.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Read More &raquo</a>

          </div>
        </div>
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
            <div class="col-md-4 col-sm-6 project-item mix nature">
              <div class="thumb">
                <div class="image">
                  <a href="<?= base_url(); ?>assets/img/portfolio_big_item_01.jpg" data-lightbox="image-1"><img src="<?= base_url(); ?>assets/img/portfolio_item_01.jpg" class="img-thumbnail"></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 project-item mix animation">
              <div class="thumb">
                <div class="image">
                  <a href="<?= base_url(); ?>assets/img/portfolio_big_item_02.jpg" data-lightbox="image-1"><img src="<?= base_url(); ?>assets/img/portfolio_item_02.jpg" class="img-thumbnail"></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 project-item mix branding">
              <div class="thumb">
                <div class="image">
                  <a href="<?= base_url(); ?>assets/img/portfolio_big_item_03.jpg" data-lightbox="image-1"><img src="<?= base_url(); ?>assets/img/portfolio_item_03.jpg" class="img-thumbnail"></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 project-item mix graphic nature">
              <div class="thumb">
                <div class="image">
                  <a href="<?= base_url(); ?>assets/img/portfolio_big_item_04.jpg" data-lightbox="image-1"><img src="<?= base_url(); ?>assets/img/portfolio_item_04.jpg" class="img-thumbnail"></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 project-item mix branding">
              <div class="thumb">
                <div class="image">
                  <a href="<?= base_url(); ?>assets/img/portfolio_big_item_05.jpg" data-lightbox="image-1"><img src="<?= base_url(); ?>assets/img/portfolio_item_05.jpg" class="img-thumbnail"></a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 project-item mix graphic animation">
              <div class="thumb">
                <div class="image">
                  <a href="<?= base_url(); ?>assets/img/portfolio_big_item_06.jpg" data-lightbox="image-1"><img src="<?= base_url(); ?>assets/img/portfolio_item_06.jpg" class="img-thumbnail"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="about" class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>About</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
      </div>
    </div>
  </div>
</section>


<!-- Contact -->
<section class="contact" id="contact">
  <div class="container container-fluid">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Contact</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="card bg-primary text-white mb-4 text-center">
          <div class="card-body">
            <h5 class="card-title">Contact Me</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <ul class="list-group mb-4">
          <li class="list-group-item">
            <h3>Location</h3>
          </li>
          <li class="list-group-item">Sekolah Menengah Kejuruan Merah Putih</li>
          <li class="list-group-item">Jl. Pasar Kecapi A No.2, RT.003/RW.013, Jatirahayu, Kec. Pd. Melati, Kota Bks, Jawa Barat 17414</li>
          <li class="list-group-item">(021) 84901694</li>
        </ul>
      </div>

      <div class="col-lg-6">

        <form>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary">Send Message</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>