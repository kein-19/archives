<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->library('form_validation');
        $this->load->model('Model_user');
        $this->load->model('Model_pegawai');
        // $this->load->model('Model_sekolah');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        // $data['tbl_user'] = $this->Model_pegawai->countAllPegawai();
        
        $this->db->from('tbl_dokuments');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];        
        
        $this->db->from('tbl_pegawai');
        $config['total_pegawai'] = $this->db->count_all_results();
        $data['total_pegawai'] = $config['total_pegawai'];


        // $data['tbl_images'] = $this->Model_gallery->getImageLimit(6, 0);
        // $data['tbl_profile'] = $this->Model_sekolah->getSekolah();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('t_user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->insert('t_user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('admin/role');
        }
    }

    public function geteditrole()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Model_user->getRoleId($id));
    }


    public function editrole()
    {
        $data['title'] = 'Role';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('t_user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Model_user->getAdmin();

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('t_user_role', $data);
            $this->session->set_flashdata('flash', 'diubah');
            redirect('admin/role');
        }
    }

    public function deleterole($id)
    {
        $this->Model_user->deleteRole($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('t_user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('t_user_menu')->result_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/admin/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('t_user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('t_user_access_menu', $data);
        } else {
            $this->db->delete('t_user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['tbl_user'] = $this->Model_user->getAdmin();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['tbl_user']['password'])) {
                $this->session->set_flashdata('flash', 'salah');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('flash', 'sama');
                    redirect('admin/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tbl_user');
                    $this->session->set_flashdata('flash', 'diubah');
                    redirect('admin/changepassword');
                }
            }
        }
    }
}
