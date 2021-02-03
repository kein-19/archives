<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // sementara memakai if dulu 
        if (!$this->session->userdata('id_doc')) {
            redirect('dokuments/login');
        }

        // is_logged_in();

        //chekAksesModule();
        $this->load->library('form_validation');
        // $this->load->library('ssp');
        $this->load->model('Model_dokuments');
    }


    public function index()
    {
        $data['title'] = 'Home';
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();

        $this->load->view('templates/_partials/header', $data);
        $this->load->view('templates/_partials/sidebar', $data);
        $this->load->view('templates/_partials/topbar', $data);
        $this->load->view('siswa_baru/index', $data);
        $this->load->view('templates/_partials/footer');
    }


    public function profile()
    {
        $data['title'] = 'Data Diri';
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();

        $this->load->view('templates/_partials/header', $data);
        $this->load->view('templates/_partials/sidebar', $data);
        $this->load->view('templates/_partials/topbar', $data);
        $this->load->view('siswa_baru/profile', $data);
        $this->load->view('templates/_partials/footer');
    }

    public function cetak()
    {

        $data['title'] = 'Data Diri';
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();
        $this->load->view('siswa_baru/print', $data);
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Data Diri';
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokuments();
        // $data['tbl_dokuments'] = $this->Model_dokuments->getAgama();
        // $data['nama_agama'] = $this->db->get('tbl_agama')->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('warganegara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('statussiswa', 'Status Arsip', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('dari__bersaudara', 'dari bersaudara', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan / Desa', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required|trim|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('tinggalbersama', 'Tinggal Bersama dengan', 'required');
        $this->form_validation->set_rules('jarak', 'Jarak Rumah ke Sekolah', 'required|trim|numeric');
        $this->form_validation->set_rules('transport', 'Ke Sekolah dengan', 'required');
        $this->form_validation->set_rules('jurusan', 'Kompetensi Keahlian', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required|trim');
        $this->form_validation->set_rules('nisn', 'Nomor Induk Arsip Nasional (NISN)', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('no_sttb', 'Tanggal/Tahun/No.STTB', 'required|trim');

        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //     'is_unique' => 'This email has already registered!'
        // ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // Data Orang Tua Arsip
        $this->form_validation->set_rules('nama_ot', 'Nama Orang Tua/Wali', 'required|trim');
        $this->form_validation->set_rules('alamat_ot', 'Alamat Orang Tua/Wali', 'required|trim');
        $this->form_validation->set_rules('no_hp_ot', 'No. HP', 'required|trim|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('pendidikan_ot', 'Pendidikan Terakhir', 'required|trim');
        $this->form_validation->set_rules('pekerjaan_ot', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('penghasilan_ot', 'Penghasilan', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/_partials/header', $data);
            $this->load->view('templates/_partials/sidebar', $data);
            $this->load->view('templates/_partials/topbar', $data);
            $this->load->view('siswa_baru/editprofile', $data);
            $this->load->view('templates/_partials/footer');
        } else {
            // $name = $this->input->post('name');
            // $email = $this->input->post('email');

            // $upload_image = $_FILES['image']['nama'];

            $this->Model_dokuments->editDataDokuments();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Anda berhasil diupdate</div>');
            redirect('user/profile');
        }
    }
}
