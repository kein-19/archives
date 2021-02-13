<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pegawai extends CI_Model
{

    public function getAllPegawai()
    {
        return $this->db->get('tbl_pegawai')->result_array();
    }

    public function getPegawai()
    {
        return $this->db->get_where('tbl_pegawai', ['email' => $this->session->userdata('email')])->row_array();
        // return $this->db->get_where('tbl_pegawai', ['id_pegawai' => $this->session->userdata('id_pegawai')])->row_array();
    }

    // fitur untuk pagination
    public function getPegawaiLimit($limit, $start, $keyword = null)
    // public function getPegawaiLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('nrh', $keyword);
            $this->db->or_like('nama_lengkap', $keyword);
            $this->db->or_like('email', $keyword);
        }
        
        return $this->db->get('tbl_pegawai', $limit, $start)->result_array();
    }

    public function countAllPegawai()
    {
        return $this->db->get('tbl_pegawai')->num_rows();
    }

    public function getPegawaiId($id_pegawai)
    {
        return $this->db->get_where('tbl_pegawai', ['id_pegawai' => $id_pegawai])->row_array();
    }

    public function getkdJabatan()
    {
        $query = "SELECT `tbl_pegawai`.*, `tbl_jabatan`.`jabatan`
                  FROM `tbl_pegawai` JOIN `tbl_jabatan`
                  ON `tbl_pegawai`.`kode_jabatan` = `tbl_jabatan`.`kode_jabatan`
                  ";
        return $this->db->query($query)->result_array();
    }
    
    public function getkdStatus()
    {
        $query = "SELECT `tbl_pegawai`.`kode_status`, `tbl_status`.`status`
                  FROM `tbl_pegawai` JOIN `tbl_status`
                  ON `tbl_pegawai`.`kode_status` = `tbl_status`.`kode_status`
                ";
        return $this->db->query($query)->result_array();
    }
    
    public function getkdJabatanrow()
    {
        $query = "SELECT `tbl_pegawai`.`kode_jabatan`, `tbl_jabatan`.`jabatan`
                  FROM `tbl_pegawai` JOIN `tbl_jabatan`
                  ON `tbl_pegawai`.`kode_jabatan` = `tbl_jabatan`.`kode_jabatan`
                  ";
        return $this->db->query($query)->row_array();
    }
    
    public function getkdStatusrow()
    {
        $query = "SELECT `tbl_pegawai`.`kode_status`, `tbl_status`.`status`
                  FROM `tbl_pegawai` JOIN `tbl_status`
                  ON `tbl_pegawai`.`kode_status` = `tbl_status`.`kode_status`
                ";
        return $this->db->query($query)->row_array();
    }

    public function getkdJabatanId($id_pegawai)
    {
        $query = "SELECT `tbl_pegawai`.*, `tbl_jabatan`.`jabatan`
                  FROM `tbl_pegawai` JOIN `tbl_jabatan`
                  ON `tbl_pegawai`.`kode_jabatan` = `tbl_jabatan`.`kode_jabatan`
                  WHERE `tbl_pegawai`.`id_pegawai` = $id_pegawai
                ";
        return $this->db->query($query)->row_array();
    }
    
    public function getkdStatusId($id_pegawai)
    {
        $query = "SELECT `tbl_pegawai`.*, `tbl_status`.`status`
                  FROM `tbl_pegawai` JOIN `tbl_status`
                  ON `tbl_pegawai`.`kode_status` = `tbl_status`.`kode_status`
                  WHERE `tbl_pegawai`.`id_pegawai` = $id_pegawai
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
            'nrh'               => ($fixkode),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            'kode_status'       => $this->input->post('kode_status', TRUE),
            'role_id'           => $this->input->post('role_id', TRUE),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            'foto'              => 'default.png',
            'password'          => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            // 'role_id' => 1,
            'is_active'         => 1,
            'date_created'      => time()
        ];
        

            $this->db->insert('tbl_pegawai', $data);
    }

    public function editPegawai($id_pegawai)
    {

        $email = $this->input->post('email', true);
        $data = [
            'nama_lengkap'      => htmlspecialchars($this->input->post('nama_lengkap', true)),
            'email'             => htmlspecialchars($email),
            // 'nrh'               => ($fixkode),
            'kode_jabatan'      => $this->input->post('kode_jabatan', TRUE),
            'kode_status'       => $this->input->post('kode_status', TRUE),
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
                $old_image = $data['tbl_pegawai']['image'];
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

        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('tbl_pegawai', $data);
    }

    public function deletePegawai($id_pegawai)
    {
        $this->db->delete(
            'tbl_pegawai',
            ['id_pegawai' => $id_pegawai]
        );
    }
}
