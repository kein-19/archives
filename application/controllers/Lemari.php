<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lemari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_user');
        $this->load->model('Lemari_model');
    }

    public function index()
    {
        $data['title'] = 'Lemari Management';
        $data['lemari'] = $thisr->db->get('tbl_lemari')->result_array();
        $this->form_validation->set_rules('lemari', 'Lemari', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('lemari/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->select('RIGHT(tbl_lemari.kode_lemari,3) as kode', false);
            $this->db->order_by('kode_lemari', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_lemari'); // cek sudah ada atau belum kodenya
            if ($query->num_rows() <> 0) {
                //jika kodenya sudah ada.      
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                //jika kodenya belum ada      
                $kode = 1;
            }
            // 2021000
            $kl = "LR";
            $nomor = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kode_lemari = $kl . $nomor;
            // $this->Model_dokuments->tambahDataDokuments($fixkode);

            $data = [
                'lemari'      => $this->input->post('lemari'),
                'lokasi'      => $this->input->post('lokasi'),
                'ruangan'     => $this->input->post('ruangan'),
                'kode_lemari' => $kode_lemari
            ];
            $this->db->insert('tbl_lemari', $data);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('lemari');
        }
    }

    public function gedit()
    {
        $id_lemari = $this->input->post('id_lemari');
        echo json_encode($this->Lemari_model->getLemariId($id_lemari));
    }

    public function edit()
    {
        $data['title'] = 'Lemari Management';
        // $data['tbl_dokuments'] = $this->db->get_where('tbl_dokuments', ['email' => $this->session->userdata('email')])->row_array();
        $data['lemari'] = $this->db->get('tbl_lemari')->result_array();
        $this->form_validation->set_rules('lemari', 'Lemari', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('lemari/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'lemari'      => $this->input->post('lemari'),
                'lokasi'      => $this->input->post('lokasi'),
                'ruangan'     => $this->input->post('ruangan')
                // 'kode_lemari' => $kode_lemari
            ];
            $this->db->where('id_lemari', $this->input->post('id_lemari'));
            $this->db->update('tbl_lemari', $data);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('lemari');
        }
    }

    public function delete($id_lemari)
    {
        $this->Lemari_model->deleteLemari($id_lemari);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('lemari');
    }

    public function getedit()
    {
        $id_lemari = $this->input->post('id_lemari');
        echo json_encode($this->Lemari_model->getSubLemariId($id_lemari));
    }
}
