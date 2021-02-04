<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dokuments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_dokuments');
        $this->load->model('Kelompok_Model');
        $this->load->model('Lemari_Model');
        $this->load->model('Kotak_Model');
    }

    public function index()
    {
        is_logged_in();
        $data['title'] = 'List Dokuments';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        // load library
        $this->load->library('pagination');
        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // config
        $this->db->like('title', $data['keyword']);
        $this->db->or_like('nomor', $data['keyword']);
        $this->db->or_like('deskripsi', $data['keyword']);
                
        $this->db->from('tbl_dokuments');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'dokuments/index';
        $config['base_url']    = "$root";
        // initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $this->load->model('Kelompok_model', 'kelompok');
        $data['kdKelompok'] = $this->kelompok->getkdKelompok();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsLimit($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('dokuments/index', $data);
        $this->load->view('templates/admin/footer');
    }

    // profile sekolah pada halaman home
    public function add()
    {
        is_logged_in();
        
        // $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('kelompok_id', 'Kelompok', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('kode_lemari', 'Lemari', 'required');
        $this->form_validation->set_rules('kode_kotak', 'Kotak', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        // $this->form_validation->set_rules('title', 'Title', 'required|trim');
        // $this->form_validation->set_rules('', 'Dokuments', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Dokuments';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('dokuments/add', $data);
            $this->load->view('templates/admin/footer');
        // $this->session->set_flashdata('flash', 'diupload');
            // redirect('dokuments');
        } else {
            $this->db->select('RIGHT(tbl_dokuments.nomor,3) as kode', false);
            $this->db->order_by('nomor', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_dokuments'); // cek sudah ada atau belum kodenya
            if ($query->num_rows() <> 0) {
                //jika kodenya sudah ada.      
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                //jika kodenya belum ada      
                $kode = 1;
            }

            $thn = substr(date('Y'), 2, 2) . substr(date('Y', strtotime('+1 years')), 2, 2);
            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $fixkode = $thn . $kodemax;
            $this->Model_dokuments->addDokuments($fixkode);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('dokuments');
        }
    }

    public function edit($id)
    {
        is_logged_in();
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('kelompok_id', 'Kelompok', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('kode_lemari', 'Lemari', 'required');
        $this->form_validation->set_rules('kode_kotak', 'Kotak', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Dokuments';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id);
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('dokuments/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_dokuments->editDokuments($id);
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('dokuments');
        }
    }

    public function detail($id)
    {
        is_logged_in();

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['title'] = 'Detail Dokuments';
        $this->load->model('Kelompok_model', 'kelompok');
        $data['tbl_kelompok'] = $this->kelompok->getkdKelompok();
        $this->load->model('Lemari_model', 'lemari');
        $data['tbl_lemari'] = $this->lemari->getkdLemari();
        $this->load->model('Kotak_model', 'kotak');
        $data['tbl_Kotak'] = $this->kotak->getkdKotak();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('dokuments/detail', $data);
        $this->load->view('templates/admin/footer');
    }

    public function delete($id)
    {
        $this->Model_dokuments->deleteDokuments($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('dokuments');
    }
}
