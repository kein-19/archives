const flashGambar = $('.flash-gambar').data('flashgambar');
// console.log(flashData);

if (flashGambar) {
	Swal.fire({
		title: 'Gambar',
		text: 'Berhasil ' + flashGambar,
		icon: 'success'
	});
}
else if (flashGambar) {
	Swal.fire({
		title: 'Gambar',
		text: 'Harus ' + flashGambar,,
		icon: 'warning'
	});
}

// tombol-hapus
$('.tombol-hapusgallery').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "gambar akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Gambar!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
