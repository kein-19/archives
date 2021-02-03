$(function () {

	$('.tombolAddSubMenu').on('click', function () {
		$('#newSubMenuModalLabel').html('Add New Sub Menu');
		$('.modal-footer button[type=submit]').html('Add');
		$('#title').val('');
		$('#menu_id').val('');
		$('#url').val('');
		$('#icon').val('');
		$('#is_active').val('1');
		$('#id').val('');
	});


	$('.tampilSubMenu').on('click', function () {

		$('#newSubMenuModalLabel').html('Edit Sub Menu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', 'http://localhost/archives/menu/editsubmenu');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/archives/menu/getedit',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				// console.log(data);
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#is_active').val(data.is_active);
				$('#id').val(data.id);
			}
		});

	});

});


const submenu = $('.submenu').data('submenu');
if (submenu == 'ditambahkan') {
	Swal.fire({
		title: 'Submenu',
		text: 'Submenu baru berhasil ' + submenu,
		icon: 'success'
	});
} else if (submenu == 'diubah') {
	Swal.fire({
		title: 'Submenu',
		text: 'Submenu berhasil ' + submenu,
		icon: 'success'
	});
} else if (submenu == 'dihapus') {
	Swal.fire({
		title: 'Submenu',
		text: 'Submenu berhasil ' + submenu,
		icon: 'success'
	});
} else if (submenu) {
	Swal.fire({
		title: 'Submenu',
		html: submenu,
		icon: 'warning'
	});
}

// else if (password == 'sama') {
//     Swal.fire({
//         title: 'Change Password',
//         text: 'Password baru tidak boleh ' + password + ' dengan current password',
//         icon: 'warning'
//     });
// } else if (password == 'diubah') {
//     Swal.fire({
//         title: 'Change Password',
//         text: 'Password berhasil ' + password,
//         icon: 'success'
//     });
// }

// tombol-hapus
$('.tombol-hapussubmenu').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "submenu akan dihapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Submenu!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
