<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dokumen extends CI_Model
{

    public function getAllDokumen()
    {
        return $this->db->get('tbl_dokuments')->result_array();
    }

    public function getDokumen()
    {
        return $this->db->get_where('tbl_dokuments', ['id' => $this->session->userdata('id')])->row_array();
    }

    // fitur untuk pagination
    public function getDokumenLimit($limit, $start, $keyword = null)
    // public function getDokumenLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('id', $keyword);
            $this->db->or_like('nomor', $keyword);
            $this->db->or_like('title', $keyword);
            $this->db->or_like('nama_lengkap', $keyword);
        }

        return $this->db->get('tbl_dokuments', $limit, $start)->result_array();
    }

    public function countAllDokumen()
    {
        return $this->db->get('tbl_dokuments')->num_rows();
    }

    public function getDokumenId($id)
    {
        return $this->db->get_where('tbl_dokuments', ['id' => $id])->row_array();
    }

    // public function getDokumen()
    // {
    //     return $this->db->get('tbl_dokuments')->row();
    // }

    // public function getAllDokumen()
    // {
    //     return $this->db->get('tbl_dokuments')->result_array();
    // }

    // public function getDokumenId($id)
    // {
    //     return $this->db->get_where('tbl_dokuments', ['id' => $id])->row_array();
    // }


    // // fitur untuk pagination
    // public function getDokumenLimit($limit, $start, $keyword = null)
    // // public function getDokumenLimit($limit, $start)
    // {
    //     // untuk pencarian
    //     if ($keyword) {
    //         $this->db->like('title', $keyword);
    //     }

    //     return $this->db->get('tbl_dokuments', $limit, $start)->result_array();
    // }

    // public function countAllDokumen()
    // {
    //     return $this->db->get('tbl_dokuments')->num_rows();
    // }

    public function addDokumen($fixkode)
    // public function addDokumen()
    {

        $data = [
            'nomor'                 => ($fixkode),
            'title'                 => htmlspecialchars($this->input->post('title', TRUE)),
            'nama_lengkap'          => $this->input->post('nama_lengkap', TRUE),
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
            $config['allowed_types'] = 'pdf|gif|jpg|jpeg|png';
            $config['max_size']      = '25600';
            $config['upload_path'] = './assets/archives/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_dokuments']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/archives/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_dokuments->editDataSekolah($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }

            $this->db->insert('tbl_dokuments', $data);
        }
    }

    public function editDokumen($id)
    {

        $data = [
            // 'nomor'                 => ($fixkode),
            'title'                 => htmlspecialchars($this->input->post('title', TRUE)),
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
            $config['allowed_types'] = 'pdf|gif|jpg|jpeg|png';
            $config['max_size']      = '25600';
            $config['upload_path'] = './assets/archives/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_dokuments']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/archives/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_dokuments->editDataSekolah($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        $this->db->where('id', $id);
        $this->db->update('tbl_dokuments', $data);
    }

    public function deleteDokumen($id)
    {
        $this->db->delete(
            'tbl_dokuments',
            ['id' => $id]
        );
    }
}
