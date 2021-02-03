$(function () {

	$('.tombolAddKotak').on('click', function () {
		$('#newKotakModalLabel').html('Add New Kotak');
		$('.modal-footer button[type=submit]').html('Add');
		// $('#ruangan').val('');
		$('#kode_lemari').val('');
		$('#kotak').val('');
		$('#id_kotak').val('');
	});


	$('.tampilKotak').on('click', function () {

		$('#newKotakModalLabel').html('Edit Kotak');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', 'http://localhost/archives/kotak/edit');

		const id_kotak = $(this).data('id_kotak');
		// console.log(id_kotak);

		$.ajax({
			url: 'http://localhost/archives/kotak/gedit',
			data: {
				id_kotak: id_kotak
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				// console.log(data);
				// $('#ruangan').val(data.ruangan);
				$('#kode_lemari').val(data.kode_lemari);
				$('#kotak').val(data.kotak);
				$('#id_kotak').val(data.id_kotak);
			}
		});

	});

});


const kotak = $('.kotak').data('kotak');
if (kotak == 'ditambahkan') {
	Swal.fire({
		title: 'Kotak',
		text: 'Kotak baru berhasil ' + kotak,
		icon: 'success'
	});
} else if (kotak == 'diubah') {
	Swal.fire({
		title: 'Kotak',
		text: 'Kotak berhasil ' + kotak,
		icon: 'success'
	});
} else if (kotak == 'dihapus') {
	Swal.fire({
		title: 'Kotak',
		text: 'Kotak berhasil ' + kotak,
		icon: 'success'
	});
} else if (kotak) {
	Swal.fire({
		title: 'Kotak',
		html: kotak,
		icon: 'warning'
	});
}


// tombol-hapus
$('.tombol-hapuskotak').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "kotak akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Kotak!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});