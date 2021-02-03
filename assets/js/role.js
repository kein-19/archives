$(function () {

	$('.tombolAddRole').on('click', function () {
		$('#newRoleModalLabel').html('Add New Role');
		$('.modal-footer button[type=submit]').html('Add');
		$('#role').val('');
		$('#id').val('');
	});


	$('.tampilRole').on('click', function () {

		$('#newRoleModalLabel').html('Edit Role');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', 'http://localhost/archives/admin/editrole');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/archives/admin/geteditrole',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				// console.log(data);
				$('#role').val(data.role);
				$('#id').val(data.id);
			}
		});

	});

});


const role = $('.role').data('role');
if (role == 'ditambahkan') {
	Swal.fire({
		title: 'Role',
		text: 'Role baru berhasil ' + role,
		icon: 'success'
	});
} else if (role == 'diubah') {
	Swal.fire({
		title: 'Role',
		text: 'Role berhasil ' + role,
		icon: 'success'
	});
} else if (role == 'dihapus') {
	Swal.fire({
		title: 'Role',
		text: 'Role berhasil ' + role,
		icon: 'success'
	});
} else if (role) {
	Swal.fire({
		title: 'Role',
		html: role,
		icon: 'warning'
	});
}


// tombol-hapus
$('.tombol-hapusrole').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "role akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Role!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
