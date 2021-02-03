<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function getAdmin()
    {
        // return $this->db->get_where('tbl_dokuments', ['id_doc' => $this->session->userdata('id_doc')])->row_array();
        return $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    }


    public function checkLogin()
    {
        // $this->db->where('username', $username);
        // $this->db->where('password',  md5($password));
        // $user = $this->db->get('tbl_user')->row_array();
        // return $user;

        $email = htmlspecialchars($this->input->post('email', TRUE));
        $password = htmlspecialchars($this->input->post('password', TRUE));

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // if ($user['role_id'] == 1) {
                    redirect('admin');
                    // } else {
                    // redirect('admin');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf akun anda belum diaktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function tambahUser()
    {

        $email = $this->input->post('email', true);
        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'foto' => 'default.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'is_active' => 1,
            // 'is_active' => 1,
            'date_created' => time()
        ];

        // // siapkan token
        // $token = base64_encode(random_bytes(32));
        // $user_token = [
        //     'email' => $email,
        //     'token' => $token,
        //     'date_created' => time()
        // ];
        // var_dump($data);

        $this->db->insert('tbl_user', $data);
        // $this->db->insert('user_token', $user_token);

        // $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Anda sudah mendaftar sebagai Admin! Silahkan Login</div>');
        redirect('auth');
    }

    public function getRoleId($id)
    {
        return $this->db->get_where('t_user_role', ['id' => $id])->row_array();
    }

    public function deleteRole($id)
    {
        $this->db->delete('t_user_role', ['id' => $id]);
    }


    // public function getDokumentsId($id_doc)
    // {
    //     return $this->db->get_where('tbl_dokuments', ['id_doc' => $id_doc])->row_array();
    // }

    // public function addDokuments($fixkode)
    // {

    //     $nama = $this->input->post('nama', TRUE);
    //     $email = $this->input->post('email', true);

    //     $data = [
    //         'id_doc'      => ($fixkode),
    //         'nama'                  => htmlspecialchars($nama),
    //         'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
    //         'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
    //         'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
    //         'kd_agama'              => $this->input->post('agama', TRUE),
    //         'warganegara'           => $this->input->post('warganegara', TRUE),
    //         'statussiswa'           => $this->input->post('statussiswa', TRUE),
    //         'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
    //         'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
    //         'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
    //         'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
    //         'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
    //         'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
    //         'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
    //         'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
    //         'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
    //         'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
    //         'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
    //         'transport'             => $this->input->post('transport', TRUE),
    //         'jurusan'               => $this->input->post('jurusan', TRUE),
    //         'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
    //         'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
    //         'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
    //         'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
    //         'suratpindah'           => $this->input->post('suratpindah', TRUE),
    //         'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),

    //         // data orang tua siswa
    //         'nama_ot'               => htmlspecialchars($this->input->post('nama_ot', TRUE)),
    //         'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
    //         'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
    //         'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
    //         'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
    //         'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

    //         // 'name' => htmlspecialchars($this->input->post('name', true)),
    //         'email'                 => htmlspecialchars($email),
    //         'image'                 => 'default.png',
    //         'password'              => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
    //         'role_id'               => 2,
    //         'is_active'             => 0,
    //         'validasi' => 'Belum',
    //         'date_created'          => time()
    //     ];
    //     $this->db->insert('tbl_dokuments', $data);
    // }

    // public function editDokuments()
    // {

    //     $nama = $this->input->post('nama', TRUE);
    //     $email = $this->input->post('email', true);
    //     // $fixkode = $this->input->post('id_doc');

    //     $is_active = $this->input->post('is_active', TRUE);
    //     if ($is_active == 1) {
    //         $validasi = 'Sudah';
    //     } elseif ($is_active == 0) {
    //         $validasi = 'Belum';
    //     }

    //     $data = [
    //         // 'id_doc'      => ($fixkode),
    //         'nama'                  => htmlspecialchars($nama),
    //         'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
    //         'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
    //         'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
    //         'kd_agama'              => $this->input->post('agama', TRUE),
    //         'warganegara'           => $this->input->post('warganegara', TRUE),
    //         'statussiswa'           => $this->input->post('statussiswa', TRUE),
    //         'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
    //         'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
    //         'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
    //         'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
    //         'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
    //         'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
    //         'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
    //         'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
    //         'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
    //         'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
    //         'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
    //         'transport'             => $this->input->post('transport', TRUE),
    //         'jurusan'               => $this->input->post('jurusan', TRUE),
    //         'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
    //         'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
    //         'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
    //         'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
    //         'suratpindah'           => $this->input->post('suratpindah', TRUE),
    //         'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),

    //         // data orang tua siswa
    //         'nama_ot'               => htmlspecialchars($this->input->post('nama_ot', TRUE)),
    //         'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
    //         'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
    //         'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
    //         'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
    //         'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

    //         // 'name' => htmlspecialchars($this->input->post('name', true)),
    //         'email'                 => htmlspecialchars($email),
    //         'password'              => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
    //         'role_id'               => 2,
    //         'is_active'             => $is_active,
    //         'validasi'              => $validasi
    //         // 'validasi'              => $this->input->post('validasi', TRUE),
    //     ];

    //     // cek jika ada gambar yang akan diupload
    //     $upload_image = $_FILES['image']['name'];

    //     if ($upload_image) {
    //         $config['allowed_types'] = 'gif|jpg|jpeg|png';
    //         $config['max_size']      = '2048';
    //         $config['upload_path'] = './assets/img/profile/';

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('image')) {
    //             $old_image = $data['tbl_dokuments']['image'];
    //             if ($old_image != 'default.jpg') {
    //                 unlink(FCPATH . 'assets/img/profile/' . $old_image);
    //             }
    //             $new_image = $this->upload->data('file_name');
    //             $this->db->set('image', $new_image);
    //             // $this->Model_dokuments->editDataDokuments($new_image);
    //         } else {
    //             echo $this->upload->dispay_errors();
    //         }
    //     }

    //     // $this->db->set('name', $data);

    //     // $this->db->set('image', $new_image);
    //     $this->db->where('id_doc', $this->input->post('id_doc'));
    //     $this->db->update('tbl_dokuments', $data);
    // }

    // public function deleteDokuments($id_doc)
    // {
    //     $this->db->delete('tbl_dokuments', ['id_doc' => $id_doc]);
    // }
}
