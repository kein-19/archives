<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_pegawai');
        $this->load->model('Kelompok_Model');
        $this->load->model('Lemari_Model');
        $this->load->model('Kotak_Model');
    }

    public function index()
    {
        is_logged_in();
        $data['title'] = 'Data Pegawai';
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
        $this->db->like('nrh', $data['keyword']);
        $this->db->or_like('nama_lengkap', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);

        $this->db->from('tbl_pegawai');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'pegawai/index';
        $config['base_url']    = "$root";
        // initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawaiLimit($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/admin/footer');
    }

    // profile sekolah pada halaman home
    public function add()
    {
        is_logged_in();

        // $this->form_validation->set_rules('nrh', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kode_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('kode_status', 'Status', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_pegawai.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Pegawai';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('pegawai/add', $data);
            $this->load->view('templates/admin/footer');
            // $this->session->set_flashdata('flash', 'diupload');
            // redirect('pegawai');
        } else {
            $this->db->select('RIGHT(tbl_pegawai.nrh,3) as kode', false);
            $this->db->order_by('nrh', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_pegawai'); // cek sudah ada atau belum kodenya
            if ($query->num_rows() <> 0) {
                //jika kodenya sudah ada.      
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                //jika kodenya belum ada      
                $kode = 1;
            }

            $thn = substr(date('Y'), 2, 2) . substr(date('m'), 2, 2);
            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $fixkode = $thn . $kodemax;
            $this->Model_pegawai->addPegawai($fixkode);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('pegawai');
        }
    }

    public function edit($id_pegawai)
    {
        is_logged_in();
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kode_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('kode_status', 'Status', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_pegawai.email]', [
        //     'is_unique' => 'Email sudah terdaftar!'
        // ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pegawai';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['tbl_pegawai'] = $this->Model_pegawai->getPegawaiId($id_pegawai);
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('pegawai/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_pegawai->editPegawai($id_pegawai);
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('pegawai');
        }
    }

    public function detail($id_pegawai)
    {
        is_logged_in();

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['title'] = 'Detail Pegawai';
        $this->load->model('Model_pegawai', 'jabatan');
        $data['kdJabatanId'] = $this->jabatan->getkdJabatanId($id_pegawai);
        $this->load->model('Model_pegawai', 'status');
        $data['kdStatusId'] = $this->status->getkdStatusId($id_pegawai);
        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawaiId($id_pegawai);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('pegawai/detail', $data);
        $this->load->view('templates/admin/footer');
    }

    public function delete($id)
    {
        $this->Model_pegawai->deletePegawai($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('pegawai');
    }
}
