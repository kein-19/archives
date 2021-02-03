<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-primary font-weight-bold mb-lg-5">Pendaftaran Siswa Baru<br>
                                SMK Merah Putih<br>
                                Tahun Pelajaran <?= date('Y') . " / " . date('Y', strtotime('+1 years')); ?></h1>
                            <!-- Tahun Pelajaran
                                <?= $t_20 = substr(date('Y'), 2, 2) . " / " . substr(date('Y', strtotime('+1 years')), 2, 2);
                                ?></h1> -->
                        </div>
                        <hr>
                        <form class="user" method="post" action="<?= base_url('auth_siswa/registration'); ?>">
                            <h3 class="h5 text-gray-900 mt-lg-5 mb-lg-3">Keterangan Pribadi Siswa</h3>
                            <!-- <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                                </div>
                            </div> -->


                            <input type="hidden" name="id_doc" id="form-field-1" class="form-control">

                            <?php
                            $thn = substr(date('Y'), 2, 2) . "-" . substr(date('Y', strtotime('+1 years')), 2, 2);
                            ?>

                            <!-- <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="form-field-1">
                                    NIM / NISN
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="nim" placeholder="MASUKAN NIM" id="form-field-1" class="form-control" value="<?= set_value(''); ?>">
                                    <?= form_error('', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                                </div
                                <div class="col-sm-5">
                                    <input type="text" name="nisn" placeholder="MASUKAN NISN" id="form-field-1" class="form-control" value="<?= set_value(''); ?>">
                                    <?= form_error('', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                                </div
                            </div> -->

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="nama">
                                    Nama Lengkap
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" id="nama" class="form-control" value="<?= set_value('nama'); ?>">
                                </div>
                                <?= form_error('nama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="tempat_lahir">
                                    Tempat Tanggal Lahir
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir'); ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>">
                                </div>
                                <?= form_error('tempat_lahir', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-4">', '</small>'); ?>
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="gender">
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
                                        "class='form-control'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('jenis_kelamin', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="agama">
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
                                <label class="col-sm-5 col-form-label" for="warganegara">
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
                                        "class='form-control'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('warganegara', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="statussiswa">
                                    Status Siswa
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
                                        "class='form-control'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('statussiswa', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="anak_ke">
                                    Anak ke
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="anak_ke" id="anak_ke" class="form-control" value="<?= set_value('anak_ke'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label" for="anak_ke">
                                    dari
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="dari__bersaudara" id="dari__bersaudara" class="form-control" value="<?= set_value('dari__bersaudara'); ?>">
                                </div>
                                <label class="col-sm-3 col-form-label" for="dari__bersaudara">
                                    saudara
                                </label>
                                <?= form_error('anak_ke', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-3">', '</small>'); ?>
                                <?= form_error('dari__bersaudara', '<small class="text-danger pl-3 col-sm-4 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label" for="jumlah_saudara">
                                    Jumlah Saudara
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="jumlah_saudara" id="jumlah_saudara" class="form-control" value="<?= set_value('jumlah_saudara'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label" for="jumlah_saudara">
                                    orang
                                </label>
                                <?= form_error('jumlah_saudara', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <hr>


                            <!-- <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="form-field-1">
                                    Foto
                                </label>
                                <div class="col-sm-2">
                                    <input type="file" name="userfile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="form-field-1">
                                    ROMBEL
                                </label>
                                <div class="col-sm-6">
                                    <?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel') ?>
                                </div>
                            </div> -->

                            <h3 class="h5 text-gray-900 mt-lg-5 mb-lg-3">Keterangan Tempat Tinggal Siswa</h3>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="alamat">
                                    Alamat
                                </label>
                                <div class="col-sm-7">
                                    <textarea name="alamat" id="alamat" class="form-control" value="<?= set_value('alamat'); ?>"></textarea>
                                </div>
                                <?= form_error('alamat', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="rt">
                                    RT / RW
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" name="rt" placeholder="RT" id="rt" class="form-control" value="<?= set_value('rt'); ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="rw" placeholder="RW" id="rw" class="form-control" value="<?= set_value('rw'); ?>">
                                </div>
                                <?= form_error('rt', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-3">', '</small>'); ?>
                                <?= form_error('rw', '<small class="text-danger pl-3 col-sm-3 align-items-sm-end">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="kelurahan">
                                    Kelurahan / Desa
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="kelurahan" placeholder="Kelurahan / Desa" id="kelurahan" class="form-control" value="<?= set_value('kelurahan'); ?>">
                                </div>
                                <?= form_error('kelurahan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="kecamatan">
                                    Kecamatan
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="kecamatan" placeholder="Kecamatan" id="kecamatan" class="form-control" value="<?= set_value('kecamatan'); ?>">
                                </div>
                                <?= form_error('kecamatan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="no_hp">
                                    No. HP
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="no_hp" placeholder="Nomor HP" id="no_hp" class="form-control" value="<?= set_value('no_hp'); ?>">
                                </div>
                                <?= form_error('no_hp', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="tinggalbersama">
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
                                        "class='form-control'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('tinggalbersama', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="jarak">
                                    Jarak Rumah ke Sekolah
                                </label>
                                <div class="col-sm-1">
                                    <input type="text" name="jarak" id="jarak" class="form-control" value="<?= set_value('jarak'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label" for="jarak">
                                    km
                                </label>
                                <?= form_error('jarak', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label" for="transport">
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
                                        "class='form-control'"
                                    );
                                    ?>
                                </div>
                                <?= form_error('transport', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <hr>

                            <h3 class="h5 text-gray-900 mt-lg-5 mb-lg-3">Keterangan Pilihan Kompetensi Keahlian</h3>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label" for="jurusan">
                                    Kompetensi Keahlian
                                </label>
                                <div class="col-sm-5">
                                    <?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan'); ?>
                                </div>
                                <?= form_error('jurusan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <hr>

                            <h3 class="h5 text-gray-900 mt-lg-5 mb-lg-3">Keterangan Pendidikan Siswa Sebelumnya</h3>
                            <h4 class="h6 text-gray-900 mt-lg-4 mb-lg-3">Asal Sekolah <span class="text-danger">(Wajib diisi)</span></h4>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="asal_sekolah">
                                    SMP/MTs
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="asal_sekolah" placeholder="SMP/MTs" id="asal_sekolah" class="form-control" value="<?= set_value('asal_sekolah'); ?>">
                                </div>
                                <?= form_error('asal_sekolah', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="nisn">
                                    Nomor Induk Siswa Nasional (NISN)
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional (NISN)" id="nisn" class="form-control" value="<?= set_value('nisn'); ?>">
                                </div>
                                <?= form_error('nisn', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="no_sttb">
                                    Tanggal/Tahun/No.STTB
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" name="no_sttb" placeholder="Tanggal/Tahun/No.STTB" id="no_sttb" class="form-control" value="<?= set_value('no_sttb'); ?>">
                                </div>
                                <label class="col-sm-2 col-form-label" for="no_sttb">
                                    tahun
                                </label>
                                <?= form_error('no_sttb', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3 col-sm-7">', '</small>'); ?>
                            </div>
                            <h4 class="h6 text-gray-900 mt-lg-4 mb-lg-3">Pindahan <span class="text-danger font-italic">(Hanya diisi oleh siswa pindahan)</span></h4>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="pindahan">
                                    Dari Sekolah
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" name="pindahan" placeholder="Asal Sekolah" id="pindahan" class="form-control" value="<?= set_value('pindahan'); ?>">
                                </div>
                                <?= form_error('pindahan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="suratpindah">
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
                                        "class='form-control'"
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row mb-lg-5">
                                <label class="col-sm-5 col-form-label" for="alasan">
                                    Alasan Pindah
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" name="alasan" placeholder="Alasan Pindah" id="alasan" class="form-control" value="<?= set_value('alasan'); ?>">
                                    <?= form_error('alasan', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row mt-lg-5">
                                <label class="col-sm-5 col-form-label" for="email">
                                    Alamat e-mail
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                </div>
                                <?= form_error('email', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label" for="password1">
                                    Password
                                </label>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control" id="password1" name="password1" placeholder="Password">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control form-control" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                                <?= form_error('password1', '<div class="col-sm-5"></div><small class="text-danger mt-sm-1 pl-3">', '</small>'); ?>
                            </div>
                            <div class="text-center mt-lg-5">
                                <button type="submit" class="btn btn-primary btn-user">
                                    Register Account
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth_siswa/forgotpassword'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth_siswa'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>