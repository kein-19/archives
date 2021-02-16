<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // sementara memakai if dulu 
        is_logged_in();
        // if (!$this->session->userdata('email')) {
        //     redirect('dokuments/login');
        // }

        //chekAksesModule();
        $this->load->library('form_validation');
        // $this->load->library('ssp');
        $this->load->model('Model_pegawai');
        $this->load->model('Model_user');
        $this->load->model('Model_dokuments');
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();
        $this->load->model('Model_pegawai', 'jabatan');
        $data['kdJabatan'] = $this->jabatan->getkdJabatanrow();
        $this->load->model('Model_pegawai', 'status');
        $data['kdStatus'] = $this->status->getkdStatusrow();
        // $this->load->model('Model_pegawai', 'role');
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
        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();

        // $data['tbl_pegawai'] = $this->db->get_where('tbl_pegawai', ['email' => $this->session->userdata('email')])->row_array();

        // $this->form_validation->set_rules('nama_lengkap', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kode_jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('kode_status', 'Status', 'required');
        // $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/_partials/header', $data);
            $this->load->view('templates/_partials/sidebar', $data);
            $this->load->view('templates/_partials/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/_partials/footer');
        } else {
            $this->Model_pegawai->editUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['tbl_pegawai'] = $this->Model_pegawai->getPegawai();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/_partials/header', $data);
            $this->load->view('templates/_partials/sidebar', $data);
            $this->load->view('templates/_partials/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/_partials/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['tbl_pegawai']['password'])) {
                $this->session->set_flashdata('flash', 'salah');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('flash', 'sama');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tbl_pegawai');
                    $this->session->set_flashdata('flash', 'diubah');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
