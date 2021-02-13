<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function getAdmin()
    {
        // return $this->db->get_where('tbl_dokuments', ['id_doc' => $this->session->userdata('id_doc')])->row_array();
        return $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    }

    // public function getkdRoleId()
    // {
    //     $query = "SELECT `tbl_user`.*, `t_user_role`.`role`
    //               FROM `tbl_user` JOIN `t_user_role`
    //               ON `tbl_user`.`role_id` = `t_user_role`.`id`
    //             ";
    //     return $this->db->query($query)->row_array();
    // }

    public function checkLogin()
    {
        // $this->db->where('username', $username);
        // $this->db->where('password',  md5($password));
        // $user = $this->db->get('tbl_user')->row_array();
        // return $user;

        $email = htmlspecialchars($this->input->post('email', TRUE));
        $password = htmlspecialchars($this->input->post('password', TRUE));

        if ($email == 'admin@gmail.com')
        {
                $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

            // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                        redirect('admin');
                        } else {
                        redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf akun anda belum diaktivasi!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
                redirect('auth');
            }
        } else if ($email == 'bkd@gmail.com') {
            $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
            
            // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        $user['role_id'] == 3;
                        // if ($user['role_id'] == 1) {
                        // redirect('admin');
                        // } else {
                        redirect('bkd');
                        // }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf akun anda belum diaktivasi!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
                redirect('auth');
            }
        } else {
            $user = $this->db->get_where('tbl_pegawai', ['email' => $email])->row_array();
            
            // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        $user['role_id'] == 2;
                        // if ($user['role_id'] == 1) {
                        // redirect('admin');
                        // } else {
                        redirect('user');
                        // }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mohon maaf akun anda belum diaktivasi!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
                redirect('auth');
            }
        }

        
    }

    public function tambahUser()
    {

        $email = $this->input->post('email', true);
        $data = [
            'nama_lengkap' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'foto' => 'default.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'is_active' => 1,
            // 'is_active' => 1,
            'date_created' => time()
        ];

        // // siapkan token
        // $token = base64_encode(random_bytes(32));
        // $user_token = [
        //     'email' => $email,
        //     'token' => $token,
        //     'date_created' => time()
        // ];
        // var_dump($data);

        $this->db->insert('tbl_user', $data);
        // $this->db->insert('user_token', $user_token);

        // $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Anda sudah mendaftar sebagai Admin! Silahkan Login</div>');
        redirect('auth');
    }

    public function getRoleId($id)
    {
        return $this->db->get_where('t_user_role', ['id' => $id])->row_array();
    }

    public function deleteRole($id)
    {
        $this->db->delete('t_user_role', ['id' => $id]);
    }

    public function editUser()
    {
        
        $email = $this->input->post('email');
        $data = [
            'nama_lengkap'          => $this->input->post('nama_lengkap', TRUE),
            // 'email'                 => $this->input->post('email', TRUE),
            'role_id'               => $this->input->post('role_id', TRUE),
            ];
            // $name = $this->input->post('nama_lengkap');
            // $role_id = $this->input->post('role_id');

            // cek jika ada gambar yang akan diupload
            $upload_foto = $_FILES['foto']['name'];

            if ($upload_foto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_foto = $data['tbl_user']['foto'];
                    if ($old_foto != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_foto);
                    }
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            // $this->db->set('nama_lengkap', $name);
            $this->db->where('email', $email);
            $this->db->update('tbl_user', $data);

        // $this->db->where('id', $id);
        // $this->db->update('tbl_dokuments', $data);
    }
}
