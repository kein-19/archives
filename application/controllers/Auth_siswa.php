<?php

class Auth_siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_dokuments');

        // $this->load->model('Model_user');
        // $this->load->model('Model_guru');
    }

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login - Arsip';
            $this->load->view('templates/siswa/auth_header', $data);
            $this->load->view('siswa_baru/login');
            $this->load->view('templates/siswa/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $siswa_baru = $this->db->get_where('tbl_dokuments', ['email' => $email])->row_array();

        // jika usernya ada
        if ($siswa_baru) {
            // jika usernya aktif
            if ($siswa_baru['is_active'] == 1) {
                // cek password
                if (password_verify($password, $siswa_baru['password'])) {
                    $data = [
                        'email' => $siswa_baru['email'],
                        'role_id' => $siswa_baru['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // if ($siswa_baru['role_id'] == 1) {
                    //     redirect('user');
                    // } else {
                    redirect('user');
                    // }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth_siswa');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth_siswa');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth_siswa');
        }
    }


    // public function chek_login()
    // {
    //     if (isset($_POST['submit'])) {
    //         // proses login disini

    //         $siswa_baruname = $this->input->post('username');
    //         $password = $this->input->post('password');
    //         $loginUser = $this->Model_user->chekLogin($siswa_baruname, $password);
    //         $loginGuru = $this->Model_guru->chekLogin($siswa_baruname, $password);
    //         if (!empty($loginUser)) {
    //             // sukses login user
    //             $this->session->set_userdata($loginUser);
    //             redirect('siswa');
    //         } elseif (!empty($loginGuru)) {
    //             // login guru
    //             $session = array(
    //                 'nama_lengkap'  =>  $loginGuru['nama_guru'],
    //                 'id_level_user' =>  3,
    //                 'id_guru'       =>  $loginGuru['id_guru']
    //             );
    //             $this->session->set_userdata($session);
    //             redirect('jadwal');
    //         } else {
    //             // gagal login
    //             redirect('auth_siswa');
    //         }
    //     } else {
    //         redirect('auth_siswa');
    //     }
    // }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('auth_siswa');
    // }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth_siswa');
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('warganegara', 'Kewarganegaraan', 'required');
        $this->form_validation->set_rules('statussiswa', 'Status Arsip', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required|trim');
        $this->form_validation->set_rules('dari__bersaudara', 'dari bersaudara', 'required|trim');
        $this->form_validation->set_rules('jumlah_saudara', 'Jumlah Saudara', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan / Desa', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required|trim');
        $this->form_validation->set_rules('tinggalbersama', 'Tinggal Bersama dengan', 'required');
        $this->form_validation->set_rules('jarak', 'Jarak Rumah ke Sekolah', 'required|trim');
        $this->form_validation->set_rules('transport', 'Ke Sekolah dengan', 'required');
        $this->form_validation->set_rules('jurusan', 'Kompetensi Keahlian', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required|trim');
        $this->form_validation->set_rules('nisn', 'Nomor Induk Arsip Nasional (NISN)', 'required|trim');
        $this->form_validation->set_rules('no_sttb', 'Tanggal/Tahun/No.STTB', 'required|trim');

        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //     'is_unique' => 'This email has already registered!'
        // ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Arsip Baru SMK Merah Putih ' . date('Y') . ' / ' . date('Y', strtotime('+1 years'));
            $this->load->view('templates/siswa/auth_header', $data);
            $this->load->view('siswa_baru/registration');
            $this->load->view('templates/siswa/auth_footer');
        } else {
            $this->Model_dokuments->tambahDataDokuments();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Terima kasih anda sudah mendaftar di SMK Merah Putih. Silahkan login!</div>');
            redirect('auth_siswa');

            // siapkan token
            // $token = base64_encode(random_bytes(32));
            // $siswa_baru_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];

            // $this->db->insert('user', $data);
            // $this->db->insert('user_token', $siswa_baru_token);

            // $this->_sendEmail($token, 'verify');

            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');

        }
    }

    // private function _sendEmail($token, $type)
    // {
    //     $config = [
    //         'protocol'  => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_user' => 'wpunpas@gmail.com',
    //         'smtp_pass' => '1234567890',
    //         'smtp_port' => 465,
    //         'mailtype'  => 'html',
    //         'charset'   => 'utf-8',
    //         'newline'   => "\r\n"
    //     ];

    //     $this->email->initialize($config);

    //     $this->email->from('wpunpas@gmail.com', 'Web Programming UNPAS');
    //     $this->email->to($this->input->post('email'));

    //     if ($type == 'verify') {
    //         $this->email->subject('Account Verification');
    //         $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth_siswa/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
    //     } else if ($type == 'forgot') {
    //         $this->email->subject('Reset Password');
    //         $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth_siswa/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    //     }

    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         echo $this->email->print_debugger();
    //         die;
    //     }
    // }


    // public function verify()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');

    //     $siswa_baru = $this->db->get_where('user', ['email' => $email])->row_array();

    //     if ($siswa_baru) {
    //         $siswa_baru_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

    //         if ($siswa_baru_token) {
    //             if (time() - $siswa_baru_token['date_created'] < (60 * 60 * 24)) {
    //                 $this->db->set('is_active', 1);
    //                 $this->db->where('email', $email);
    //                 $this->db->update('user');

    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
    //                 redirect('auth_siswa');
    //             } else {
    //                 $this->db->delete('user', ['email' => $email]);
    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
    //                 redirect('auth_siswa');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
    //             redirect('auth_siswa');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
    //         redirect('auth_siswa');
    //     }
    // }

    // public function blocked()
    // {
    //     $this->load->view('auth_siswa/blocked');
    // }
}
