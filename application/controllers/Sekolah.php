<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_sekolah');
    }

    public function index()
    {
        is_logged_in();
        $data['title'] = 'Profile Sekolah';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['tbl_profile'] = $this->Model_sekolah->getSekolah();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('sekolah/index', $data);
        $this->load->view('templates/admin/footer');
    }

    // profile sekolah pada halaman home
    public function profile()
    {
        $data['title'] = 'Profile Sekolah';
        $data['sekolah'] = 'SMK MERAH PUTIH';
        $data['visi_misi'] = 'Visi dan Misi SMK Merah Putih';
        $data['tbl_profile'] = $this->Model_sekolah->getSekolah();
        $this->load->view('templates/header', $data);
        $this->load->view('sekolah/profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editprofilesekolah($id)
    {
        is_logged_in();
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('kenapa_kami', 'Kenapa memilih kami ?', 'required|trim');
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim');
        $this->form_validation->set_rules('motto', 'MOTTO', 'required|trim');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required|trim');
        $this->form_validation->set_rules('nomor_ijin', 'Nomor Ijin', 'required|trim');
        $this->form_validation->set_rules('tgl_berdiri', 'Tanggal Berdiri', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('fax', 'Fax', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('status_sekolah', 'Sekolah', 'required|trim');
        $this->form_validation->set_rules('yayasan', 'Yayasan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['title'] = 'Edit Profile Sekolah';
            $data['tbl_profile'] = $this->Model_sekolah->getSekolahId($id);
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('sekolah/editprofilesekolah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_sekolah->editProfileSekolah();
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('sekolah');
        }
    }
}
