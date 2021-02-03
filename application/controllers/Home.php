<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dokuments');
        $this->load->model('Model_sekolah');
        $this->load->model('Model_gallery');
    }

    public function index()
    {
        $data['title'] = 'SMK MERAH PUTIH';
        $data['sekolah'] = 'SMK MERAH PUTIH';

        // load library
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            // $data['keyword'] = null;
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $this->db->like('id_doc', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
        $this->db->or_like('asal_sekolah', $data['keyword']);
        $this->db->or_like('kelurahan', $data['keyword']);
        $this->db->or_like('validasi', $data['keyword']);
        $this->db->from('tbl_dokuments');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'home/index';
        $config['base_url']    = "$root";

        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsLimit($config['per_page'], $data['start'], $data['keyword']);
        $data['tbl_images'] = $this->Model_gallery->getAllImage();
        $data['tbl_profile'] = $this->Model_sekolah->getSekolah();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
