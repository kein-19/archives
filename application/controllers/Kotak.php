<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kotak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_user');
        $this->load->model('Kotak_model');
    }

    public function index()
    {
        $data['title'] = 'Kotak Management';
        $this->load->model('Lemari_model', 'lemari');
        $data['kdLemari'] = $this->lemari->getkdLemari();
        $data['kotak'] = $this->db->get('tbl_kotak')->result_array();
        $this->form_validation->set_rules('kotak', 'Kotak', 'required');
        $this->form_validation->set_rules('kode_lemari', 'Lemari', 'required');
        // $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('kotak/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->select('RIGHT(tbl_kotak.kode_kotak,1) as kode', false);
            $this->db->order_by('kode_kotak', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_kotak'); // cek sudah ada atau belum kodenya
            if ($query->num_rows() <> 0) {
                //jika kodenya sudah ada.      
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                //jika kodenya belum ada      
                $kode = 1;
            }
            // 2021000
            $kl = "BX";
            $nomor = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $kode_kotak = $kl . $nomor;
            // $this->Model_dokuments->tambahDataDokuments($fixkode);

            $data = [
                'kotak'      => $this->input->post('kotak'),
                'kode_lemari'      => $this->input->post('kode_lemari'),
                // 'ruangan'     => $this->input->post('ruangan'),
                'kode_kotak' => $kode_kotak
            ];
            $this->db->insert('tbl_kotak', $data);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('kotak');
        }
    }

    public function gedit()
    {
        $id_kotak = $this->input->post('id_kotak');
        echo json_encode($this->Kotak_model->getKotakId($id_kotak));
    }

    public function edit()
    {
        $data['title'] = 'Kotak Management';
        // $data['tbl_dokuments'] = $this->db->get_where('tbl_dokuments', ['email' => $this->session->userdata('email')])->row_array();
        $data['kotak'] = $this->db->get('tbl_kotak')->result_array();
        $this->form_validation->set_rules('kotak', 'Kotak', 'required');
        $this->form_validation->set_rules('kode_lemari', 'Lemari', 'required');
        // $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('kotak/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'kotak'      => $this->input->post('kotak'),
                'kode_lemari'      => $this->input->post('kode_lemari'),
                // 'ruangan'     => $this->input->post('ruangan')
                // 'kode_kotak' => $kode_kotak
            ];
            $this->db->where('id_kotak', $this->input->post('id_kotak'));
            $this->db->update('tbl_kotak', $data);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('kotak');
        }
    }

    public function delete($id_kotak)
    {
        $this->Kotak_model->deleteKotak($id_kotak);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('kotak');
    }

    public function getedit()
    {
        $id_kotak = $this->input->post('id_kotak');
        echo json_encode($this->Kotak_model->getSubKotakId($id_kotak));
    }
}
