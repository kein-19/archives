

const sekolah = $('.sekolah').data('sekolah');
if (sekolah == 'diupdate') {
	Swal.fire({
		title: 'Profil Sekolah',
		text: 'Profil sekolah berhasil ' + sekolah,
		icon: 'success'
	});

} else if (sekolah) {
	Swal.fire({
		title: 'sekolah',
		html: sekolah,
		icon: 'warning'
	});
}



