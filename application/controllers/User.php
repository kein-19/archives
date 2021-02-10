<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // sementara memakai if dulu 
        is_logged_in();
        // if (!$this->session->userdata('id_doc')) {
            // redirect('dokuments/login');
        // }

        // is_logged_in();

        //chekAksesModule();
        $this->load->library('form_validation');
        // $this->load->library('ssp');
        $this->load->model('Model_user');
        $this->load->model('Model_pegawai');
        $this->load->model('Model_dokuments');
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();
        $this->load->model('Model_pegawai', 'jabatan');
        $data['kdJabatan'] = $this->jabatan->getkdJabatan();
        $this->load->model('Model_pegawai', 'divisi');
        $data['kdDivisi'] = $this->divisi->getkdDivisi();
        // $this->load->model('Model_user', 'role');
        // $data['kdRoleId'] = $this->role->getkdRoleId();
        $this->load->view('templates/_partials/header', $data);
        $this->load->view('templates/_partials/sidebar', $data);
        $this->load->view('templates/_partials/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/_partials/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();

        // $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/_partials/header', $data);
            $this->load->view('templates/_partials/sidebar', $data);
            $this->load->view('templates/_partials/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/_partials/footer');
        } else {
            $this->Model_user->editUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    
}
