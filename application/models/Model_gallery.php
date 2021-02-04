<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_gallery extends CI_Model
{

    public function getImage()
    {
        return $this->db->get('tbl_images')->row();
    }

    public function getAllImage()
    {
        return $this->db->get('tbl_images')->result_array();
    }

    public function getImageId($id)
    {
        return $this->db->get_where('tbl_images', ['id' => $id])->row_array();
    }


    // fitur untuk pagination
    public function getImageLimit($limit, $start, $keyword = null)
    // public function getDokumentsLimit($limit, $start)
    {
        // untuk pencarian
        if ($keyword) {
            $this->db->like('title', $keyword);
        }

        return $this->db->get('tbl_images', $limit, $start)->result_array();
    }

    public function countAllImage()
    {
        return $this->db->get('tbl_images')->num_rows();
    }

    public function addImage()
    {

        $data = [
            'title'             => htmlspecialchars($this->input->post('title', TRUE))
        ];

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'pdf|gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/gallery/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_images']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/gallery/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // $this->Model_dokuments->editDataSekolah($new_image);
            } else {
                echo $this->upload->dispay_errors();
            }

            $this->db->insert('tbl_images', $data);
        }
    }

    public function editImage($id)
    {

        $data = [
            'title'             => htmlspecialchars($this->input->post('title', TRUE))
        ];

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/gallery/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tbl_images']['image'];
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


        $this->db->where('id', $id);
        $this->db->update('tbl_images', $data);
    }

    public function deleteImage($id)
    {
        $this->db->delete(
            'tbl_images',
            ['id' => $id]
        );
    }
}
