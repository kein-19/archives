$(function () {

	$('.tombolAddLemari').on('click', function () {
		$('#newLemariModalLabel').html('Add New Lemari');
		$('.modal-footer button[type=submit]').html('Add');
		$('#ruangan').val('');
		$('#lokasi').val('');
		$('#lemari').val('');
		$('#id_lemari').val('');
	});


	$('.tampilLemari').on('click', function () {

		$('#newLemariModalLabel').html('Edit Lemari');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', 'http://localhost/archives/lemari/edit');

		const id_lemari = $(this).data('id_lemari');
		// console.log(id_lemari);

		$.ajax({
			url: 'http://localhost/archives/lemari/gedit',
			data: {
				id_lemari: id_lemari
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				// console.log(data);
				$('#ruangan').val(data.ruangan);
				$('#lokasi').val(data.lokasi);
				$('#lemari').val(data.lemari);
				$('#id_lemari').val(data.id_lemari);
			}
		});

	});

});


const lemari = $('.lemari').data('lemari');
if (lemari == 'ditambahkan') {
	Swal.fire({
		title: 'Lemari',
		text: 'Lemari baru berhasil ' + lemari,
		icon: 'success'
	});
} else if (lemari == 'diubah') {
	Swal.fire({
		title: 'Lemari',
		text: 'Lemari berhasil ' + lemari,
		icon: 'success'
	});
} else if (lemari == 'dihapus') {
	Swal.fire({
		title: 'Lemari',
		text: 'Lemari berhasil ' + lemari,
		icon: 'success'
	});
} else if (lemari) {
	Swal.fire({
		title: 'Lemari',
		html: lemari,
		icon: 'warning'
	});
}


// tombol-hapus
$('.tombol-hapuslemari').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "lemari akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Lemari!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
