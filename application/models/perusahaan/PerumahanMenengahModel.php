<?php

class PerumahanMenengahModel extends CI_Model{

    function filter(){
        $query = $this->db->query("SELECT * FROM link_url WHERE filter_ = 'perumahan_menengah' ");
        return $query->result();
    }

    function semua(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id");
        return $query->result();
    }

    function tipe_elit(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND id_tipe = 1");
        return $query->result();
    }

    function tipe_murah(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND id_tipe = 2");
        return $query->result();
    }

}
    
?>