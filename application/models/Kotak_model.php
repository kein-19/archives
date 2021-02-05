<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kotak_model extends CI_Model
{
    
    public function getkdKotak()
    {
        $query = "SELECT `tbl_dokuments`.*, `tbl_kotak`.`kotak`
                  FROM `tbl_dokuments` JOIN `tbl_kotak`
                  ON `tbl_dokuments`.`kode_kotak` = `tbl_kotak`.`kode_kotak`
                ";
        return $this->db->query($query)->result_array();
    }
    

    public function getkdKotakId($id)
    {
        $query = "SELECT `tbl_dokuments`.*, `tbl_kotak`.`kotak`
                  FROM `tbl_dokuments` JOIN `tbl_kotak`
                  ON `tbl_dokuments`.`kode_kotak` = `tbl_kotak`.`kode_kotak`
                  WHERE `tbl_dokuments`.`id` = $id
                ";
        return $this->db->query($query)->row_array();
    }
    

    public function getKotakId($id_kotak)
    {
        return $this->db->get_where('tbl_kotak', ['id_kotak' => $id_kotak])->row_array();
    }

    public function deleteKotak($id_kotak)
    {
        $this->db->delete('tbl_kotak', ['id_kotak' => $id_kotak]);
    }
}
