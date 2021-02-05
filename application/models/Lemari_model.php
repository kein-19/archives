<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lemari_model extends CI_Model
{
    public function getkdLemari()
    {
        $query = "SELECT `tbl_kotak`.*, `tbl_lemari`.`lemari`
                  FROM `tbl_kotak` JOIN `tbl_lemari`
                  ON `tbl_kotak`.`kode_lemari` = `tbl_lemari`.`kode_lemari`
                ";
        return $this->db->query($query)->result_array();
    } 
    
    public function getkdLemariId($id)
    {
        $query = "SELECT `tbl_dokuments`.*, `tbl_lemari`.`lemari`
                  FROM `tbl_dokuments` JOIN `tbl_lemari`
                  ON `tbl_dokuments`.`kode_lemari` = `tbl_lemari`.`kode_lemari`
                  WHERE `tbl_dokuments`.`id` = $id
                ";
        return $this->db->query($query)->row_array();
    }
    
    public function getLemariId($id_lemari)
    {
        return $this->db->get_where('tbl_lemari', ['id_lemari' => $id_lemari])->row_array();
    }

    public function deleteLemari($id_lemari)
    {
        $this->db->delete('tbl_lemari', ['id_lemari' => $id_lemari]);
    }
}
