<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_model extends CI_Model
{
    public function getKelompokId($id)
    {
        return $this->db->get_where('tbl_kelompok', ['id' => $id])->row_array();
    }

    public function deleteKelompok($id)
    {
        $this->db->delete('tbl_kelompok', ['id' => $id]);
    }
}
