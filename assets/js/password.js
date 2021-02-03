const password = $('.password').data('password');
if (password == 'salah') {
    Swal.fire({
        title: 'Change Password',
        text: 'Current password Anda ' + password,
        icon: 'warning'
    });
} else if (password == 'sama') {
    Swal.fire({
        title: 'Change Password',
        text: 'Password baru tidak boleh ' + password + ' dengan current password',
        icon: 'warning'
    });
} else if (password == 'diubah') {
    Swal.fire({
        title: 'Change Password',
        text: 'Password berhasil ' + password,
        icon: 'success'
    });
}