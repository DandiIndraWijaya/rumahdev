<?php

class PerumahanElitModel extends CI_Model{

    function filter(){
        $query = $this->db->query("SELECT * FROM link_url WHERE filter_ = 'perumahan_elit' ");
        return $query->result();
    }

    function semua(){
        $query = $this->db->query("SELECT * FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = tipe_perumahan_elit.id");
        return $query->result();
    }

    function tipe_elit(){
        $query = $this->db->query("SELECT * FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = tipe_perumahan_elit.id AND id_tipe = 1");
        return $query->result();
    }

    function tipe_menengah(){
        $query = $this->db->query("SELECT * FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = tipe_perumahan_elit.id AND id_tipe = 2");
        return $query->result();
    }

    function tipe_murah(){
        $query = $this->db->query("SELECT * FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = tipe_perumahan_elit.id AND id_tipe = 3");
        return $query->result();
    }

}
    
?>