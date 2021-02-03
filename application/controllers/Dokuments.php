<?php
class Dokuments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_dokuments');
    }

    // halaman dokuments login sebagai admin
    public function index()
    {
        is_logged_in();

        $data['title'] = 'Daftar Arsip';
        $data['tbl_user'] = $this->Model_user->getAdmin();

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
        $this->db->or_like('nomor', $data['keyword']);
        $this->db->or_like('title', $data['keyword']);
        $this->db->or_like('deskripsi', $data['keyword']);
        $this->db->or_like('name_file', $data['keyword']);
        $this->db->from('tbl_dokuments');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $root = "http://" . $_SERVER['HTTP_HOST'] . '/';
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $root .= 'dokuments/index';
        $config['base_url']    = "$root";

        // initialize
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsLimit($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('dokuments/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function registration()
    {
        if ($this->session->userdata('id_doc')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('warganegara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('statussiswa', 'Status Siswa', 'required');
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
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa Nasional (NISN)', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('no_sttb', 'Tanggal/Tahun/No.STTB', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_dokuments.email]', [
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
            $data['title'] = 'Pendaftaran Arsip SMK Merah Putih ' . date('Y') . ' / ' . date('Y', strtotime('+1 years'));
            $data['judul'] = 'Pendaftaran Arsip';
            $data['sekolah'] = 'SMK MERAH PUTIH';
            $this->load->view('templates/header', $data);
            $this->load->view('dokuments/registration', $data);
            $this->load->view('templates/footer-ori', $data);
        } else {
            $this->db->select('RIGHT(tbl_dokuments.id_doc,4) as kode', false);
            $this->db->order_by('id_doc', 'DESC');
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

            // siapkan kode
            $thn = substr(date('Y'), 2, 2) . substr(date('Y', strtotime('+1 years')), 2, 2);
            $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $fixkode = $thn . $kodemax;
            $this->Model_dokuments->tambahDataDokuments($fixkode);
            $this->session->set_flashdata('message', $fixkode);
            redirect('dokuments/registration');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('id_doc', 'Nomor Formulir', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login - Arsip';
            $data['judul'] = 'Login - Arsip';
            $data['sekolah'] = 'SMK MERAH PUTIH';
            $this->load->view('templates/header', $data);
            $this->load->view('dokuments/login', $data);
            $this->load->view('templates/footer-ori', $data);
        } else {
            // validasinya success
            $this->Model_dokuments->checkLogin();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_doc');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil logout! Terima kasih</div>');
        redirect('dokuments/login');
    }


    public function add()
    {
        is_logged_in();

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('kode_lemari', 'Lemari', 'required');
        $this->form_validation->set_rules('kode_kotak', 'Kotak', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['title'] = 'Tambah Data Arsip';
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('dokuments/add', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->select('RIGHT(tbl_dokuments.id_doc,4) as kode', false);
            $this->db->order_by('id_doc', 'DESC');
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
            $this->Model_dokuments->tambahDataDokuments($fixkode);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('dokuments');
        }
    }

    public function detail($id_doc)
    {
        is_logged_in();

        $data['tbl_user'] = $this->Model_user->getAdmin();
        $data['title'] = 'Detail Data Arsip';
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id_doc);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('dokuments/detail', $data);
        $this->load->view('templates/admin/footer');
    }


    public function edit($id_doc)
    {
        is_logged_in();

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('kelompok_id', 'Kelompok', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('kode_lemari', 'Lemari', 'required');
        $this->form_validation->set_rules('kode_kotak', 'Kotak', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();
            $data['title'] = 'Edit Data Arsip';
            $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id_doc);
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('dokuments/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->Model_dokuments->editDokuments();
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('dokuments');
        }
    }

    public function delete($id_doc)
    {
        $this->Model_dokuments->deleteDokuments($id_doc);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('dokuments');
    }

    public function cetak($id_doc)
    {
        $data['title'] = 'Detail Data Arsip';
        $data['tbl_dokuments'] = $this->Model_dokuments->getDokumentsId($id_doc);
        $this->load->view('dokuments/print', $data);
    }
}
