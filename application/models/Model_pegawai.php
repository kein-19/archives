<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pegawai extends CI_Model
{

    public function getAllPegawai()
    {
        return $this->db->get('tbl_user')->result_array();
    }

    public function getPegawai()
    {
        return $this->db->get_where('tbl_user', ['id' => $this->session->userdata('id')])->row_array();
    }

    // fitur untuk pagination
    public function getPegawaiLimit($limit, $start, $keyword = null)
    // public function getPegawaiLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('nik', $keyword);
            $this->db->or_like('nama_lengkap', $keyword);
            $this->db->or_like('divisi', $keyword);
        }

        return $this->db->get('tbl_user', $limit, $start)->result_array();
    }

    public function countAllPegawai()
    {
        return $this->db->get('tbl_user')->num_rows();
    }

    public function getPegawaiId($id_user)
    {
        return $this->db->get_where('tbl_user', ['id_user' => $id_user])->row_array();
    }

    public function getkdJabatan()
    {
        $query = "SELECT `tbl_user`.*, `tbl_jabatan`.`jabatan`
                  FROM `tbl_user` JOIN `tbl_jabatan`
                  ON `tbl_user`.`kode_jabatan` = `tbl_jabatan`.`kode_jabatan`
                ";
        return $this->db->query($query)->result_array();
    }
    
    public function getkdDivisi()
    {
        $query = "SELECT `tbl_user`.*, `tbl_divisi`.`divisi`
                  FROM `tbl_user` JOIN `tbl_divisi`
                  ON `tbl_user`.`kode_divisi` = `tbl_divisi`.`kode_divisi`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getkdJabatanId($id)
    {
        $query = "SELECT `tbl_user`.*, `tbl_jabatan`.`jabatan`
                  FROM `tbl_user` JOIN `tbl_jabatan`
                  ON `tbl_user`.`kode_jabatan` = `tbl_jabatan`.`kode_jabatan`
                  WHERE `tbl_user`.`id` = $id
                ";
        return $this->db->query($query)->row_array();
    }

    public function addPegawai($fixkode)
    // public function addPegawai()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama_lengkap'      => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'email'             => htmlspecialchars($email),
            'nik'               => ($fixkode),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            'kode_divisi'       => $this->input->post('kode_divisi', TRUE),
            'role_id'           => $this->input->post('role_id', TRUE),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            'foto'              => 'default.png',
            'password'          => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            // 'role_id' => 1,
            'is_active'         => 1,
            'date_created'      => time()
        ];
        

            $this->db->insert('tbl_user', $data);
    }

    public function editPegawai($id_user)
    {

        $email = $this->input->post('email', true);
        $data = [
            'nama_lengkap'      => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'email'             => htmlspecialchars($email),
            // 'nik'               => ($fixkode),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            'kode_divisi'       => $this->input->post('kode_divisi', TRUE),
            'role_id'           => $this->input->post('role_id', TRUE),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            // 'foto'              => 'default.png',
            'password'          => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            // 'role_id' => 1,
            // 'is_active'         => 1,
            // 'date_created'      => time()
        ];
        
        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'pdf|gif|jpg|jpeg|png';
            $config['max_size']      = '25600';
            $config['upload_path'] = './assets/archives/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/archives/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_pegawai->editDataSekolah($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);
    }

    public function deletePegawai($id_user)
    {
        $this->db->delete(
            'tbl_user',
            ['id_user' => $id_user]
        );
    }
}
