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
        <center><a href="<?= base_url('dokuments/petunjuk'); ?>" class="btn btn-primary btn-lg petunjuk">Baca Petunjuk Pendaftaran</a>
    </div>
</div>

<section id="petunjuk">
    <div class="container js-scroll-trigger">
        <div id="accordion">
            <h3>Isi Formulir</h3>
            <div>
                <p>
                    Lengkapi Formulir untuk dapat menerima akses masuk ke tahap selanjutnya
                </p>
            </div>
            <h3>Isi data pendidikan</h3>
            <div>
                <p>
                    Jika pengisian formulir berhasil isilah data pendidikan dengan sebenar-benarnya
                </p>
            </div>
            <h3>Isi data orang tua</h3>
            <div>
                <p>
                    Jika pengisian berhasil isilah data orang tua dengan sebenar benarnya
                </p>
            </div>
            <h3>Upload Dokumen</h3>
            <div>
                <p>Upload beberapa dokumen yang diperlukan sebagai bahan perlengkapan data
                </p>
            </div>
            <h3>Pembayaran</h3>
            <div>
                <p>Lakukan Pembayaran sesuai nominal yang tertera
                </p>
            </div>
        </div>
    </div>
</section>
<br>