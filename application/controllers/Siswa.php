<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Model_user');
        // $this->load->model('Model_siswa');
        $this->load->model('Model_siswa');
    }

    public function index()
    {
        $data['title'] = 'Daftar Siswa';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        // $data['tbl_siswa'] = $this->Model_siswa->getAllSiswa();

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
        $this->db->like('nis', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
        $this->db->or_like('kelurahan', $data['keyword']);
        $this->db->from('tbl_siswa');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->Model_siswa->countAllSiswa();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'siswa/index';
        $config['base_url']    = "$root";
        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['tbl_siswa'] = $this->Model_siswa->getSiswaLimit($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('warganegara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('statussiswa', 'Status Siswa', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('dari_bersaudara', 'dari bersaudara', 'required|trim|numeric|max_length[3]');
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
        // $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required|trim');
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional (NISN)', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('no_sttb', 'Tanggal/Tahun/No.STTB', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_siswa.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);

        // Data Orang Tua Siswa
        $this->form_validation->set_rules('nama_ot', 'Nama Orang Tua/Wali', 'required|trim');
        $this->form_validation->set_rules('alamat_ot', 'Alamat Orang Tua/Wali', 'required|trim');
        $this->form_validation->set_rules('no_hp_ot', 'No. HP', 'required|trim|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('pendidikan_ot', 'Pendidikan Terakhir', 'required|trim');
        $this->form_validation->set_rules('pekerjaan_ot', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('penghasilan_ot', 'Penghasilan', 'required|trim|numeric');


        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['title'] = 'Tambah Data Siswa';

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('siswa/add', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->select('RIGHT(tbl_siswa.nis,4) as kode', false);
            $this->db->order_by('nis', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('tbl_siswa'); // cek sudah ada atau belum kodenya
            if ($query->num_rows() <> 0) {
                //jika kodenya sudah ada.      
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                //jika kodenya belum ada      
                $kode = 1;
            }

            // siapkan kode
            // $thn = substr(date('Y'), 2, 2) . "-" . substr(date('Y', strtotime('+1 years')), 2, 2);
            $thn = substr(date('Y'), 2, 2) . substr(date('Y', strtotime('+1 years')), 2, 2);
            // $bln = date('md');
            // $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $fixkode = $thn . $kodemax;
            // $fixkode = $thn . "-dokuments-" . $bln . $kodemax;

            $this->Model_siswa->tambahDataSiswa($fixkode);

            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('siswa');
        }
    }

    public function detail($nis)
    {

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['title'] = 'Detail Data Siswa';
        $data['tbl_siswa'] = $this->Model_siswa->getSiswaId($nis);

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('siswa/detail', $data);
        $this->load->view('templates/admin/footer');
    }


    public function edit($nis)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('warganegara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('statussiswa', 'Status Siswa', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required|trim|numeric|max_length[3]');
        $this->form_validation->set_rules('dari_bersaudara', 'dari bersaudara', 'required|trim|numeric|max_length[3]');
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
        // $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required|trim');
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional (NISN)', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('no_sttb', 'Tanggal/Tahun/No.STTB', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        // Data Orang Tua Siswa
        $this->form_validation->set_rules('nama_ot', 'Nama Orang Tua/Wali', 'required|trim');
        $this->form_validation->set_rules('alamat_ot', 'Alamat Orang Tua/Wali', 'required|trim');
        $this->form_validation->set_rules('no_hp_ot', 'No. HP', 'required|trim|numeric|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('pendidikan_ot', 'Pendidikan Terakhir', 'required|trim');
        $this->form_validation->set_rules('pekerjaan_ot', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('penghasilan_ot', 'Penghasilan', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['title'] = 'Edit Data Siswa';
            $data['tbl_siswa'] = $this->Model_siswa->getSiswaId($nis);

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('siswa/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_siswa->editDataSiswa();
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('siswa');
        }
    }


    public function delete($nis)
    {
        $this->Model_siswa->deleteSiswa($nis);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('siswa');
    }
}
