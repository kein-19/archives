$(function () {

	$('.tombolAddKelompok').on('click', function () {
		$('#newKelompokModalLabel').html('Add New Kelompok');
		$('.modal-footer button[type=submit]').html('Add');
		// $('#kelompok_icon').val('');
		$('#kelompok').val('');
		$('#id').val('');
	});


	$('.tampilKelompok').on('click', function () {

		$('#newKelompokModalLabel').html('Edit Kelompok');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', 'http://localhost/archives/kelompok/edit');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/archives/kelompok/gedit',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				// console.log(data);
				// $('#kelompok_icon').val(data.kelompok_icon);
				$('#kelompok').val(data.kelompok);
				$('#id').val(data.id);
			}
		});

	});

});


const kelompok = $('.kelompok').data('kelompok');
if (kelompok == 'ditambahkan') {
	Swal.fire({
		title: 'Kelompok',
		text: 'Kelompok baru berhasil ' + kelompok,
		icon: 'success'
	});
} else if (kelompok == 'diubah') {
	Swal.fire({
		title: 'Kelompok',
		text: 'Kelompok berhasil ' + kelompok,
		icon: 'success'
	});
} else if (kelompok == 'dihapus') {
	Swal.fire({
		title: 'Kelompok',
		text: 'Kelompok berhasil ' + kelompok,
		icon: 'success'
	});
} else if (kelompok) {
	Swal.fire({
		title: 'Kelompok',
		html: kelompok,
		icon: 'warning'
	});
}


// tombol-hapus
$('.tombol-hapuskelompok').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "kelompok akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Kelompok!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
