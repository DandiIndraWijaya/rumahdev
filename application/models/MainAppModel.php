<?php

class MainAppModel extends CI_Model{
    function tipe_perumelit(){
        $query = $this->db->query("SELECT * FROM tipe_perumahan_elit");
        return $query->result();
    }

    function tipe_perummenengah(){
        $query = $this->db->query("SELECT * FROM tipe_perumahan_menengah");
        return $query->result();
    }

    function apartemen(){
        $query = $this->db->query("SELECT * FROM harga_apartemen");
        return $query->row_array();
    }

    function perumahan_elit(){
        $query = $this->db->query("SELECT * FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = tipe_perumahan_elit.id");
        return $query->result();
    }
}

?>