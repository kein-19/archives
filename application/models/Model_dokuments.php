<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dokuments extends CI_Model
{
    // get data seluruh siswa baru
    public function getAllDokuments()
    {
        return $this->db->get('tbl_dokuments')->result_array();
    }

    public function getDokuments()
    {
        return $this->db->get_where('tbl_dokuments', ['id_doc' => $this->session->userdata('id_doc')])->row_array();
    }

    // fitur untuk pagination
    public function getDokumentsLimit($limit, $start, $keyword = null)
    // public function getDokumentsLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('id_doc', $keyword);
            $this->db->or_like('nomor', $keyword);
            $this->db->or_like('title', $keyword);
            $this->db->or_like('deskripsi', $keyword);
            $this->db->or_like('name_file', $keyword);
        }

        return $this->db->get('tbl_dokuments', $limit, $start)->result_array();
    }

    public function countAllDokuments()
    {
        return $this->db->get('tbl_dokuments')->num_rows();
    }

    public function getDokumentsId($id_doc)
    {
        return $this->db->get_where('tbl_dokuments', ['id_doc' => $id_doc])->row_array();
    }

    public function checkLogin()
    {
        $kp = htmlspecialchars($this->input->post('id_doc', TRUE));
        $password = htmlspecialchars($this->input->post('password', TRUE));

        $siswa_baru = $this->db->get_where('tbl_dokuments', ['id_doc' => $kp])->row_array();

        // var_dump($password);

        // jika usernya ada
        if ($siswa_baru) {
            // jika usernya aktif
            // if ($siswa_baru['is_active'] == 0) {
            // cek password
            if ($password == $siswa_baru['tanggal_lahir']) {
                $data = [
                    'id_doc' => $siswa_baru['id_doc'],
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

    public function tambahDataDokuments($fixkode)
    {

        $title = $this->input->post('title', TRUE);
        // $email = $this->input->post('email', true);

        $data = [
            'nomor'                 => ($fixkode),
            'title'                 => htmlspecialchars($title),
            'jenis'                 => $this->input->post('jenis', TRUE),
            'kelompok_id'           => $this->input->post('kelompok_id', TRUE),
            'tgl_surat'             => htmlspecialchars($this->input->post('tgl_surat', TRUE)),
            'kode_lemari'           => $this->input->post('kode_lemari', TRUE),
            'kode_kotak'            => $this->input->post('kode_kotak', TRUE),
            'deskripsi'             => htmlspecialchars($this->input->post('deskripsi', TRUE))
        ];

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '25600';
            $config['upload_path']   = './assets/img/gallery/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_dokuments']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/gallery/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_dokuments->editDataSekolah($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        $this->db->insert('tbl_dokuments', $data);
    }

    // Untuk seluruh data dokuments yang ada dimenu admin
    public function editDokuments()
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);
        // $fixkode = $this->input->post('id_doc');

        $is_active = $this->input->post('is_active', TRUE);
        if ($is_active == 1) {
            $validasi = 'Sudah';
        } elseif ($is_active == 0) {
            $validasi = 'Belum';
        }

        $data = [
            // 'id_doc'      => ($fixkode),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
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
            'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
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
            'email'                 => htmlspecialchars($email),
            'password'              => password_hash($this->input->post('tanggal_lahir'), PASSWORD_DEFAULT),
            'role_id'               => 2,
            'is_active'             => $is_active,
            'validasi'              => $validasi
            // 'validasi'              => $this->input->post('validasi', TRUE),
        ];

        // cek jika ada gambar yang akan diupload
        $upload_name_file = $_FILES['name_file']['name'];

        if ($upload_name_file) {
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']      = '25600';
            $config['upload_path'] = './assets/archives/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('name_file')) {
                $old_name_file = $data['tbl_dokuments']['name_file'];
                if ($old_name_file != 'default.jpg') {
                    unlink(FCPATH . 'assets/archives/' . $old_name_file);
                }
                $new_name_file = $this->upload->data('file_name');
                $this->db->set('name_file', $new_name_file);
                // $this->Model_dokuments->editDataDokuments($new_name_file);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        // $this->db->set('name', $data);

        // $this->db->set('name_file', $new_name_file);
        $this->db->where('id_doc', $this->input->post('id_doc'));
        $this->db->update(
            'tbl_dokuments',
            $data
        );
    }

    // Untuk data diri masing-masing user/dokuments
    public function editDataDokuments()
    {

        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', true);
        $fixkode = $this->input->post('id_doc', true);

        $data = [
            'id_doc'      => ($fixkode),
            'nama'                  => htmlspecialchars($nama),
            'tempat_lahir'          => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
            'tanggal_lahir'         => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', TRUE),
            'kd_agama'              => $this->input->post('agama', TRUE),
            'warganegara'           => $this->input->post('warganegara', TRUE),
            'statussiswa'           => $this->input->post('statussiswa', TRUE),
            'anak_ke'               => htmlspecialchars($this->input->post('anak_ke', TRUE)),
            'dari__bersaudara'      => htmlspecialchars($this->input->post('dari__bersaudara', TRUE)),
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
            'asal_sekolah'          => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
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
        $upload_name_file = $_FILES['name_file']['name'];

        if ($upload_name_file) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('name_file')) {
                $old_name_file = $data['tbl_dokuments']['name_file'];
                if ($old_name_file != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_name_file);
                }
                $new_name_file = $this->upload->data('file_name');
                $this->db->set('name_file', $new_name_file);
                // $this->Model_dokuments->editDataDokuments($new_name_file);
            } else {
                echo $this->upload->dispay_errors();
            }
        }


        // $this->db->set('name', $data);

        // $this->db->set('name_file', $new_name_file);
        $this->db->where('id_doc', $fixkode);
        $this->db->update('tbl_dokuments', $data);
    }

    // public function deleteDokuments($fixkode)
    // {
    //     $this->db->delete('t_user_sub_menu', ['id' => $id]);
    // }

    public function deleteDokuments($id_doc)
    {
        $this->db->delete(
            'tbl_dokuments',
            ['id_doc' => $id_doc]
        );
    }
}
