<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kelompok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_user');
        $this->load->model('Kelompok_model');
    }

    public function index()
    {
        $data['title'] = 'Kelompok Management';
        $data['kelompok'] = $this->db->get('tbl_kelompok')->result_array();
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required');
        // $this->form_validation->set_rules('kelompok_id', 'Kelompok Icon', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('kelompok/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->select('RIGHT(tbl_kelompok.kelompok_id,2) as kode', false);
            $this->db->order_by('kelompok_id', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_kelompok'); // cek sudah ada atau belum kodenya
            if ($query->num_rows() <> 0) {
                //jika kodenya sudah ada.      
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                //jika kodenya belum ada      
                $kode = 1;
            }
            // 2021000
            // $thn = substr(date('Y'), 2, 2) . substr(date('Y', strtotime('+1 years')), 2, 2);
            $kelompok_id = str_pad($kode, 1, "1", STR_PAD_LEFT);
            // $fixkode = $thn . $kodemax;
            // $this->Model_dokuments->tambahDataDokuments($fixkode);

            $data = [
                'kelompok'      => $this->input->post('kelompok'),
                'kelompok_id' => $kelompok_id
            ];
            $this->db->insert('tbl_kelompok', $data);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('kelompok');
        }
    }

    public function gedit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Kelompok_model->getKelompokId($id));
    }

    public function edit()
    {
        $data['title'] = 'Kelompok Management';
        // $data['tbl_dokuments'] = $this->db->get_where('tbl_dokuments', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompok'] = $this->db->get('tbl_kelompok')->result_array();
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('kelompok/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'kelompok'      => $this->input->post('kelompok'),
                // 'kelompok_id' => $this->input->post('kelompok_id')
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tbl_kelompok', $data);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('kelompok');
        }
    }

    public function delete($id)
    {
        $this->Kelompok_model->deleteKelompok($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('kelompok');
    }

    public function getedit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Kelompok_model->getSubKelompokId($id));
    }
}
