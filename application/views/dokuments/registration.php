<div class="jumbotron daftar luhur">
    <center><img src="<?= base_url(); ?>assets/img/tut.png" alt="" width="10%" class="mt-4"></center>
    <div class="text-center">
        <h2 style="color:rgb(252, 252, 252)">
            <center><?= $judul; ?></center>
        </h2>
        <h1 style="color:rgb(252, 252, 252)">
            <center><?= $sekolah; ?></center>
        </h1>
        <h2 style="color:rgb(252, 252, 252); margin-bottom:30px;">
            <center>Tahun Pelajaran <?= date('Y') . " / " . date('Y', strtotime('+1 years')); ?></center>
        </h2>
        <center>
            <a href="#petunjuk" class="btn btn-primary btn-lg petunjuk" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="petunjuk">Baca Petunjuk Pendaftaran</a>
        </center>
    </div>
</div>


<!-- Petunjuk Pendaftaran -->
<div class="container">
    <div class="collapse col-sm-8 mx-auto" id="petunjuk">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header bg-primary" id="headingOne">
                    <h2 class="mb-0">
                        <button style="font-size: large; font-weight: bolder; " class="btn btn-link text-decoration-none text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Buka Website SMK MERAH PUTIH
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body text-center">
                        <a href="https://www.smkarchives.net">https://www.smkarchives.net</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary" id="headingTwo">
                    <h2 class="mb-0">
                        <button style="font-size: large; font-weight: bolder; " class="btn btn-link text-decoration-none text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Isi Formulir
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>Klik Dokuments ONLINE</li>
                            <li>Isi Formulir Pendaftaran untuk dapat menerima akses masuk ke tahap selanjutnya</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary" id="headingThree">
                    <h2 class="mb-0">
                        <button style="font-size: large; font-weight: bolder; " class="btn btn-link text-decoration-none text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Login Arsip
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>Jika pengisian berhasil anda akan menerima nomor formulir / kode pendaftaran</li>
                            <li>Login menggunakan <strong>nomor formulir / kode pendaftaran</strong> dan isi password dengan <strong>tanggal lahir</strong> dibalik (<strong>tahun-bulan-tanggal</strong>)</li>
                            <small>Contoh:
                                <table>
                                    <tr>
                                        <td>Nomor Formulir</td>
                                        <td>: <strong>2021000</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>: <strong>2001-01-01</strong></td>
                                    </tr>
                                </table>
                            </small>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary" id="headingFour">
                    <h2 class="mb-0">
                        <button style="font-size: large; font-weight: bolder; " class="btn btn-link text-decoration-none text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Cetak Dokumen
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        Cetak Data diri yang terdapat pada My Profile, atau klik Edit Profile apabila ingin mengubah data diri.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary" id="headingFive">
                    <h2 class="mb-0">
                        <button style="font-size: large; font-weight: bolder; " class="btn btn-link text-decoration-none text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Menyerahkan Formulir
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        Serahkan Formulir tersebut ke sekolah beserta berkas-berkas yang di minta.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary" id="headingSix">
                    <h2 class="mb-0">
                        <button style="font-size: large; font-weight: bolder; " class="btn btn-link text-decoration-none text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Pembayaran
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                        Biaya pendaftaran dapat di Cicil sebanyak 3x melalui Bank DKI atau langsung ke sekolah.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir dari Petunjuk Pendaftaran -->

<div class="container-fluid mt-5">
    <div class="row" style="margin-left:0;margin-right:0;">

        <div class="col-md-8 mx-auto">
            <div class="row bg-light mb-5">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="header">
                            <h3 class="h3 text-gray-900 mb-lg-5">
                                <center>Formulir Pendaftaran</center>
                            </h3>
                        </div>
                        <?php
                        if ($this->session->flashdata('message')) :
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">Selamat! Terima kasih anda sudah mendaftar di SMK Merah Putih.<br>
                                Silahkan login! dengan menggunakan Nomor Formulir <strong><?= $this->session->flashdata('message'); ?></strong> dan Password dengan menggunakan <strong>tanggal lahir</strong>!"
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <hr style="border:1px solid light;">

                        <form class="user" method="post" action="<?= base_url('dokuments/registration'); ?>">
                            <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Pribadi Arsip</h3>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="nama">
                                    Nama Lengkap
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" id="nama" class="form-control form-control-sm" value="<?= set_value('nama'); ?>">
                                </div>
                                <?= form_error('nama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="tempat_lahir">
                                    Tempat Tanggal Lahir
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir" class="form-control form-control-sm" value="<?= set_value('tempat_lahir'); ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir" class="form-control form-control-sm" value="<?= set_value('tanggal_lahir'); ?>">
                                </div>
                                <?= form_error('tempat_lahir', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-4">', '</small>'); ?>
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="gender">
                                    Jenis Kelamin
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    $jenis_kelamin = array(
                                        null => '- Silahkan Pilih -',
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan'
                                    );
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'jenis_kelamin',
                                        $jenis_kelamin,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('jenis_kelamin', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="agama">
                                    Agama
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama');
                                    ?>
                                </div>
                                <?= form_error('agama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>

                            <!-- tambahan dari yang ada -->

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="warganegara">
                                    Kewarganegaraan
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    $warganegara = array(
                                        null => '- Silahkan Pilih -',
                                        'WNI' => 'Warga Negara Indonesia',
                                        'WNA' => 'Warga Negara Asing'
                                    );
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'warganegara',
                                        $warganegara,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('warganegara', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="statussiswa">
                                    Status Arsip
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    $statussiswa = array(
                                        null => '- Silahkan Pilih -',
                                        'Kandung' => 'Kandung',
                                        'Yatim' => 'Yatim',
                                        'Piatu' => 'Piatu',
                                        'Yatim Piatu' => 'Yatim Piatu',
                                        'Tiri' => 'Tiri',
                                        'Angkat' => 'Angkat'
                                    );
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'statussiswa',
                                        $statussiswa,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('statussiswa', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="anak_ke">
                                    Anak ke
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="anak_ke" id="anak_ke" class="form-control form-control-sm" value="<?= set_value('anak_ke'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="anak_ke">
                                    dari
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="dari__bersaudara" id="dari__bersaudara" class="form-control form-control-sm" value="<?= set_value('dari__bersaudara'); ?>">
                                </div>
                                <label class="col-sm-3 col-form-label col-form-label-sm" for="dari__bersaudara">
                                    saudara
                                </label>
                                <?= form_error('anak_ke', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-3">', '</small>'); ?>
                                <?= form_error('dari__bersaudara', '<small class="text-danger pl-3 col-sm-4 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="jumlah_saudara">
                                    Jumlah Saudara
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="jumlah_saudara" id="jumlah_saudara" class="form-control form-control-sm" value="<?= set_value('jumlah_saudara'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="jumlah_saudara">
                                    orang
                                </label>
                                <?= form_error('jumlah_saudara', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="email">
                                    E-mail
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm" id="email" name="email" placeholder="E-mail" value="<?= set_value('email'); ?>">
                                </div>
                                <?= form_error('email', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <hr>

                            <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Tempat Tinggal Arsip</h3>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="alamat">
                                    Alamat
                                </label>
                                <div class="col-sm-7">
                                    <textarea name="alamat" id="alamat" class="form-control form-control-sm" value="<?= set_value('alamat'); ?>"></textarea>
                                </div>
                                <?= form_error('alamat', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="rt">
                                    RT / RW
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" name="rt" placeholder="RT" id="rt" class="form-control form-control-sm" value="<?= set_value('rt'); ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="rw" placeholder="RW" id="rw" class="form-control form-control-sm" value="<?= set_value('rw'); ?>">
                                </div>
                                <?= form_error('rt', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-3">', '</small>'); ?>
                                <?= form_error('rw', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="kelurahan">
                                    Kelurahan / Desa
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="kelurahan" placeholder="Kelurahan / Desa" id="kelurahan" class="form-control form-control-sm" value="<?= set_value('kelurahan'); ?>">
                                </div>
                                <?= form_error('kelurahan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="kecamatan">
                                    Kecamatan
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="kecamatan" placeholder="Kecamatan" id="kecamatan" class="form-control form-control-sm" value="<?= set_value('kecamatan'); ?>">
                                </div>
                                <?= form_error('kecamatan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="no_hp">
                                    No. HP
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="no_hp" placeholder="Nomor HP" id="no_hp" class="form-control form-control-sm" value="<?= set_value('no_hp'); ?>">
                                </div>
                                <?= form_error('no_hp', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="tinggalbersama">
                                    Tinggal Bersama dengan
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    $tinggalbersama = array(
                                        null => '- Silahkan Pilih -',
                                        'Orang tua' => 'Orang tua',
                                        'Saudara' => 'Saudara',
                                        'Orang lain' => 'Orang lain',
                                        'Asrama' => 'Asrama'
                                    );
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'tinggalbersama',
                                        $tinggalbersama,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('tinggalbersama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="jarak">
                                    Jarak Rumah ke Sekolah
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="jarak" id="jarak" class="form-control form-control-sm" value="<?= set_value('jarak'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="jarak">
                                    km
                                </label>
                                <?= form_error('jarak', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="transport">
                                    Ke Sekolah dengan
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    $transport = array(
                                        null => '- Silahkan Pilih -',
                                        'Kendaraan Umum' => 'Kendaraan Umum',
                                        'Kendaraan Pribadi' => 'Kendaraan Pribadi',
                                        'Jalan Kaki' => 'Jalan Kaki'
                                    );
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'transport',
                                        $transport,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('transport', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <hr>

                            <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Pilihan Kompetensi Keahlian</h3>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="jurusan">
                                    Kompetensi Keahlian
                                </label>
                                <div class="col-sm-5">
                                    <?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan'); ?>
                                </div>
                                <?= form_error('jurusan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <hr>

                            <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Pendidikan Arsip Sebelumnya</h3>
                            <h4 class="h6 text-gray-900 mt-sm-4 mb-sm-3">Asal Sekolah <span class="text-danger">(Wajib diisi)</span></h4>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="asal_sekolah">
                                    SMP/MTs
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="asal_sekolah" placeholder="SMP/MTs" id="asal_sekolah" class="form-control form-control-sm" value="<?= set_value('asal_sekolah'); ?>">
                                </div>
                                <?= form_error('asal_sekolah', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="nisn">
                                    Nomor Induk Arsip Nasional (NISN)
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="nisn" placeholder="Nomor Induk Arsip Nasional (NISN)" id="nisn" class="form-control form-control-sm" value="<?= set_value('nisn'); ?>">
                                </div>
                                <?= form_error('nisn', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="no_sttb">
                                    Tanggal/Tahun/No.STTB
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" name="no_sttb" placeholder="Tanggal/Tahun/No.STTB" id="no_sttb" class="form-control form-control-sm" value="<?= set_value('no_sttb'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="no_sttb">
                                    tahun
                                </label>
                                <?= form_error('no_sttb', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <h4 class="h6 text-gray-900 mt-sm-4 mb-sm-3">Pindahan <span class="text-danger font-italic">(Hanya diisi oleh siswa pindahan)</span></h4>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="pindahan">
                                    Dari Sekolah
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="pindahan" placeholder="Asal Sekolah" id="pindahan" class="form-control form-control-sm" value="<?= set_value('pindahan'); ?>">
                                </div>
                                <?= form_error('pindahan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="suratpindah">
                                    Surat Pindah + Raport
                                </label>
                                <div class="col-sm-5">
                                    <?php
                                    $suratpindah = array(
                                        null => '- Silahkan Pilih -',
                                        'Ada' => 'Ada',
                                        'Tidak' => 'Tidak'
                                    );
                                    $pilih = array(null);
                                    echo form_dropdown(
                                        'suratpindah',
                                        $suratpindah,
                                        $pilih,
                                        "class='form-control form-control-sm'"
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="alasan">
                                    Alasan Pindah
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" name="alasan" placeholder="Alasan Pindah" id="alasan" class="form-control form-control-sm" value="<?= set_value('alasan'); ?>">
                                    <?= form_error('alasan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <hr>

                            <h3 class="h5 text-gray-900 mt-sm-5 mb-sm-3">Keterangan Data Orang Tua Arsip</h3>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="nama_ot">
                                    Nama Orang Tua/Wali
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama_ot" placeholder="Masukkan Nama Orang Tua/Wali" id="nama_ot" class="form-control form-control-sm" value="<?= set_value('nama_ot'); ?>">
                                </div>
                                <?= form_error('nama_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="alamat_ot">
                                    Alamat Orang Tua/Wali
                                </label>
                                <div class="col-sm-7">
                                    <textarea name="alamat_ot" id="alamat_ot" class="form-control form-control-sm" value="<?= set_value('alamat_ot'); ?>"></textarea>
                                </div>
                                <?= form_error('alamat_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="no_hp_ot">
                                    No. HP
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="no_hp_ot" placeholder="Nomor HP" id="no_hp_ot" class="form-control form-control-sm" value="<?= set_value('no_hp_ot'); ?>">
                                </div>
                                <?= form_error('no_hp_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="pendidikan_ot">
                                    Pendidikan Terakhir
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="pendidikan_ot" placeholder="Pendidikan Terakhir" id="pendidikan_ot" class="form-control form-control-sm" value="<?= set_value('pendidikan_ot'); ?>">
                                </div>
                                <?= form_error('pendidikan_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="pekerjaan_ot">
                                    Pekerjaan
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="pekerjaan_ot" placeholder="Pekerjaan" id="pekerjaan_ot" class="form-control form-control-sm" value="<?= set_value('pekerjaan_ot'); ?>">
                                </div>
                                <?= form_error('pekerjaan_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="penghasilan_ot">
                                    Penghasilan
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="penghasilan_ot" placeholder="Penghasilan" id="penghasilan_ot" class="form-control form-control-sm" value="<?= set_value('penghasilan_ot'); ?>">
                                </div>
                                <?= form_error('penghasilan_ot', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <!-- <div class="form-group row">
                                <label class="col-sm-5 col-form-label col-form-label-sm" for="password1">
                                    Password
                                </label>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-sm form-control form-control-sm" id="password1" name="password1" placeholder="Password">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control form-control-sm form-control form-control-sm" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                                <?= form_error('password1', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div> -->
                            <div class="text-center mt-lg-5">
                                <button type="submit" class="btn btn-success btn-block btn-user">
                                    Daftar
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="text-primary" href="<?= base_url('dokuments/login'); ?>">Sudah Daftar? Silahkan Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>