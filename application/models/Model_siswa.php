<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    // get data seluruh siswa baru
    public function getAllSiswa()
    {
        return $this->db->get('tbl_siswa')->result_array();
    }

    public function getSiswa()
    {
        return $this->db->get_where('tbl_siswa', ['nis' => $this->session->userdata('nis')])->row_array();
    }

    public function getSiswaId($nis)
    {
        return $this->db->get_where('tbl_siswa', ['nis' => $nis])->row_array();
    }

    // fitur untuk pagination
    public function getSiswaLimit($limit, $start, $keyword = null)
    // public function getSiswaLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('nis', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('kelurahan', $keyword);
            // $this->db->or_like('validasi', $keyword);
        }

        return $this->db->get('tbl_siswa', $limit, $start)->result_array();
    }

    public function countAllSiswa()
    {
        return $this->db->get('tbl_siswa')->num_rows();
    }



    public function checkLogin()
    {
        $kp = htmlspecialchars($this->input->post('nis', TRUE));
        $password = htmlspecialchars($this->input->post('password', TRUE));

        $siswa_baru = $this->db->get_where('tbl_siswa', ['nis' => $kp])->row_array();

        // var_dump($password);

        // jika usernya ada
        if ($siswa_baru) {
            // jika usernya aktif
            // if ($siswa_baru['is_active'] == 0) {
            // cek password
            if ($password == $siswa_baru['tanggal_lahir']) {
                $data = [
                    'nis' => $siswa_baru['nis'],
                    'role_id' => $siswa_baru['role_id']
                ];

                $this->session->set_userdata($data);
                // if ($siswa_baru['role_id'] == 1) {
                //     redirect('user');
                // } else {
                redirect('user');
                // }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
                redirect('dokuments/login');
            }
            // } else {
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf akun anda belum diaktivasi!</div>');
            //     redirect('dokuments/login');
            // }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Formulir belum terdaftar</div>');
            redirect('dokuments/login');
        }
    }

    public function tambahDataSiswa($fixkode)
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);

        $data = [
            'nis'                   => ($fixkode),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari_bersaudara'      => htmlspecialchars($this->input->post('dari_bersaudara', TRUE)),
            'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
            'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
            'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
            'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
            'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
            'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
            'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
            'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
            'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
            'transport'             => $this->input->post('transport', TRUE),
            'jurusan'               => $this->input->post('jurusan', TRUE),
            // 'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
            'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
            'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
            'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
            'suratpindah'           => $this->input->post('suratpindah', TRUE),
            'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),

            // data orang tua siswa
            'nama_ot'               => htmlspecialchars($this->input->post('nama_ot', TRUE)),
            'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
            'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
            'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
            'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
            'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

            // 'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            // 'validasi' => 'Belum',
            'date_created' => time()
        ];
        $this->db->insert('tbl_siswa', $data);
    }

    public function editDataSiswa()
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);
        // $fixkode = $this->input->post('nis', true);

        $data = [
            // 'nis'                   => ($fixkode),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari_bersaudara'      => htmlspecialchars($this->input->post('dari_bersaudara', TRUE)),
            'jumlah_saudara'        => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
            'alamat'                => htmlspecialchars($this->input->post('alamat', TRUE)),
            'rt'                    => htmlspecialchars($this->input->post('rt', TRUE)),
            'rw'                    => htmlspecialchars($this->input->post('rw', TRUE)),
            'kelurahan'             => htmlspecialchars($this->input->post('kelurahan', TRUE)),
            'kecamatan'             => htmlspecialchars($this->input->post('kecamatan', TRUE)),
            'no_hp'                 => htmlspecialchars($this->input->post('no_hp', TRUE)),
            'tinggalbersama'        => $this->input->post('tinggalbersama', TRUE),
            'jarak'                 => htmlspecialchars($this->input->post('jarak', TRUE)),
            'transport'             => $this->input->post('transport', TRUE),
            'jurusan'               => $this->input->post('jurusan', TRUE),
            // 'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
            'nisn'                  => htmlspecialchars($this->input->post('nisn', TRUE)),
            'no_sttb'               => htmlspecialchars($this->input->post('no_sttb', TRUE)),
            'pindahan'              => htmlspecialchars($this->input->post('pindahan', TRUE)),
            'suratpindah'           => $this->input->post('suratpindah', TRUE),
            'alasan'                => htmlspecialchars($this->input->post('alasan', TRUE)),

            // data orang tua siswa
            'nama_ot'               => htmlspecialchars($this->input->post('nama_ot', TRUE)),
            'alamat_ot'             => htmlspecialchars($this->input->post('alamat_ot', TRUE)),
            'no_hp_ot'              => htmlspecialchars($this->input->post('no_hp_ot', TRUE)),
            'pendidikan_ot'         => htmlspecialchars($this->input->post('pendidikan_ot', TRUE)),
            'pekerjaan_ot'          => htmlspecialchars($this->input->post('pekerjaan_ot', TRUE)),
            'penghasilan_ot'        => htmlspecialchars($this->input->post('penghasilan_ot', TRUE)),

            // 'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
            'role_id' => 2
        ];

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_siswa']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_dokuments->editDataSiswa($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }


        // $this->db->set('name', $data);

        // $this->db->set('image', $new_image);
        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('tbl_siswa', $data);
    }


    public function deleteSiswa($nis)
    {
        $this->db->delete(
            'tbl_siswa',
            ['nis' => $nis]
        );
    }
}
