<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Documents extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_pegawai');
        $this->load->model('Model_dokuments');
        $this->load->model('Kelompok_Model');
        $this->load->model('Lemari_Model');
        $this->load->model('Kotak_Model');
    }

    public function index()
    {
        is_logged_in();
        $data['title'] = 'List Dokuments';
        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
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
        $this->db->or_like('jenis', $data['keyword']);
                
        $this->db->from('tbl_dokuments');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'pegawai/dokuments/index';
        $config['base_url']    = "$root";
        // initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        // $this->load->model('Kelompok_model', 'kelompok');
        // $data['kdKelompok'] = $this->kelompok->getkdKelompok();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsLimit($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/_partials/header', $data);
        $this->load->view('templates/_partials/sidebar', $data);
        $this->load->view('templates/_partials/topbar', $data);
        $this->load->view('pegawai/dokuments/index', $data);
        $this->load->view('templates/_partials/footer');
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
            $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
            $this->load->view('templates/_partials/header', $data);
            $this->load->view('templates/_partials/sidebar', $data);
            $this->load->view('templates/_partials/topbar', $data);
            $this->load->view('pegawai/dokuments/add', $data);
            $this->load->view('templates/_partials/footer');
        // $this->session->set_flashdata('flash', 'diupload');
            // redirect('documents');
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
            redirect('documents');
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
            $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
            $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id);
            $this->load->view('templates/_partials/header', $data);
            $this->load->view('templates/_partials/sidebar', $data);
            $this->load->view('templates/_partials/topbar', $data);
            $this->load->view('pegawai/dokuments/edit', $data);
            $this->load->view('templates/_partials/footer');
        } else {
            $this->Model_dokuments->editDokuments($id);
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('documents');
        }
    }

    public function detail($id)
    {
        is_logged_in();

        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
        $data['title'] = 'Detail Dokuments';
        $this->load->model('Kelompok_model', 'kelompok');
        $data['kdKelompokId'] = $this->kelompok->getkdKelompokId($id);
        $this->load->model('Lemari_model', 'lemari');
        $data['kdLemariId'] = $this->lemari->getkdLemariId($id);
        $this->load->model('Kotak_model', 'kotak');
        $data['kdKotakId'] = $this->kotak->getkdKotakId($id);
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id);
        $this->load->view('templates/_partials/header', $data);
        $this->load->view('templates/_partials/sidebar', $data);
        $this->load->view('templates/_partials/topbar', $data);
        $this->load->view('pegawai/dokuments/detail', $data);
        $this->load->view('templates/_partials/footer');
    }

    public function delete($id)
    {
        $this->Model_dokuments->deleteDokuments($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('documents');
    }
}
