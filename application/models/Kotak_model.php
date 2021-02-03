<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kotak_model extends CI_Model
{
        
    public function getKotakId($id_kotak)
    {
        return $this->db->get_where('tbl_kotak', ['id_kotak' => $id_kotak])->row_array();
    }

    public function deleteKotak($id_kotak)
    {
        $this->db->delete('tbl_kotak', ['id_kotak' => $id_kotak]);
    }
}
