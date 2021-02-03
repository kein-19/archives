<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `t_user_sub_menu`.*, `t_user_menu`.`menu`
                  FROM `t_user_sub_menu` JOIN `t_user_menu`
                  ON `t_user_sub_menu`.`menu_id` = `t_user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getMenuId($id)
    {
        return $this->db->get_where('t_user_menu', ['id' => $id])->row_array();
    }

    public function deleteMenu($id)
    {
        $this->db->delete('t_user_menu', ['id' => $id]);
    }

    public function getSubMenuId($id)
    {
        return $this->db->get_where('t_user_sub_menu', ['id' => $id])->row_array();
    }

    public function deleteSubMenu($id)
    {
        $this->db->delete('t_user_sub_menu', ['id' => $id]);
    }
}
