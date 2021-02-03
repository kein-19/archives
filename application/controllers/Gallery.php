<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_gallery');
    }

    public function index()
    {
        is_logged_in();
        $data['title'] = 'List Image';
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
        $this->db->from('tbl_images');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'gallery/index';
        $config['base_url']    = "$root";
        // initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['tbl_images'] = $this->Model_gallery->getImageLimit($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('templates/admin/footer');
    }

    // profile sekolah pada halaman home
    public function addimage()
    {
        is_logged_in();
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        // $this->form_validation->set_rules('image', 'Image', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Image';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('gallery/addimage', $data);
            $this->load->view('templates/admin/footer');
        // $this->session->set_flashdata('flash', 'diupload');
            // redirect('gallery');
        } else {
            $this->Model_gallery->addImage();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('gallery');
        }
    }

    public function editimage($id)
    {
        is_logged_in();
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Image';
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['tbl_images'] = $this->Model_gallery->getImageId($id);
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('gallery/editimage', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_gallery->editImage($id);
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('gallery');
        }
    }

    public function deleteimage($id)
    {
        $this->Model_gallery->deleteImage($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('gallery');
    }
}
