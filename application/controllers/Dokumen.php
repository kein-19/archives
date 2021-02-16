<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_dokumen');
        $this->load->model('Kelompok_Model');
        $this->load->model('Lemari_Model');
        $this->load->model('Kotak_Model');
    }

    public function index()
    {
        is_logged_in();
        $data['title'] = 'List Dokumen';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        // load library
        $this->load->library('pagination');
        // ambil data pencarian
        if ($this->input->post('submit')) {
            $data['pencarian'] = $this->input->post('pencarian');
            $this->session->set_userdata('pencarian', $data['pencarian']);
        } else {
            $data['pencarian'] = $this->session->userdata('pencarian');
        }
        // config
        $this->db->like('title', $data['pencarian']);
        $this->db->or_like('nomor', $data['pencarian']);
        $this->db->or_like('nama_lengkap', $data['pencarian']);
                
        $this->db->from('tbl_dokuments');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'bkd/dokumen/index';
        $config['base_url']    = "$root";
        // initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        // $this->load->model('Kelompok_model', 'kelompok');
        // $data['kdKelompok'] = $this->kelompok->getkdKelompok();
        $data['tbl_dokuments'] = $this->Model_dokumen->getDokumenLimit($config['per_page'], $data['start'], $data['pencarian']);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('bkd/dokumen/index', $data);
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
        // $this->form_validation->set_rules('', 'Dokumen', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Dokumen';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('bkd/dokumen/add', $data);
            $this->load->view('templates/admin/footer');
        // $this->session->set_flashdata('flash', 'diupload');
            // redirect('dokumen');
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
            $this->Model_dokumen->addDokumen($fixkode);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('dokumen');
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
            $data['title'] = 'Edit Dokumen';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['tbl_dokuments'] = $this->Model_dokumen->getDokumenId($id);
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('bkd/dokumen/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_dokumen->editDokumen($id);
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('dokumen');
        }
    }

    public function detail($id)
    {
        is_logged_in();

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['title'] = 'Detail Dokumen';
        $this->load->model('Kelompok_model', 'kelompok');
        $data['kdKelompokId'] = $this->kelompok->getkdKelompokId($id);
        $this->load->model('Lemari_model', 'lemari');
        $data['kdLemariId'] = $this->lemari->getkdLemariId($id);
        $this->load->model('Kotak_model', 'kotak');
        $data['kdKotakId'] = $this->kotak->getkdKotakId($id);
        $data['tbl_dokuments'] = $this->Model_dokumen->getDokumenId($id);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('bkd/dokumen/detail', $data);
        $this->load->view('templates/admin/footer');
    }

    public function delete($id)
    {
        $this->Model_dokumen->deleteDokumen($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('dokumen');
    }
}
