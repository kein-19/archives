<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_model extends CI_Model
{
    public function getkdKelompok()
    {
        $query = "SELECT `tbl_dokuments`.*, `tbl_kelompok`.`kelompok`
                  FROM `tbl_dokuments` JOIN `tbl_kelompok`
                  ON `tbl_dokuments`.`kelompok_id` = `tbl_kelompok`.`kelompok_id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKelompokId($id)
    {
        return $this->db->get_where('tbl_kelompok', ['id' => $id])->row_array();
    }

    public function deleteKelompok($id)
    {
        $this->db->delete('tbl_kelompok', ['id' => $id]);
    }
}
