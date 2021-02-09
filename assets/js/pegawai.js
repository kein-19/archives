const flashPegawai = $('.flash-pegawai').data('flashpegawai');
// console.log(flashData);

if (flashPegawai) {
	Swal.fire({
		title: 'Pegawai',
		text: 'Berhasil ' + flashPegawai,
		icon: 'success'
	});
}
else if (flashPegawai) {
	Swal.fire({
		title: 'Pegawai',
		text: 'Harus ' + flashPegawai,
		icon: 'warning'
	});
}

// tombol-hapus
$('.tombol-hapuspegawai').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "pegawai akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Pegawai!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
