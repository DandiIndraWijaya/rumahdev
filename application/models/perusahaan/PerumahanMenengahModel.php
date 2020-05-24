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

    //Perumahan menengah tersedia
    function semua_tersedia(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND kode NOT IN (SELECT kode_item FROM transaksi) OR kode IN (SELECT kode_item FROM transaksi WHERE aktif = 0)");
        return $query->result();
    }

    function tipe_elit_tersedia(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND id_tipe = 1 AND kode NOT IN (SELECT kode_item FROM transaksi) OR kode IN (SELECT kode_item FROM transaksi WHERE aktif = 0)");
        return $query->result();
    }

    function tipe_murah_tersedia(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND id_tipe = 2 AND kode NOT IN (SELECT kode_item FROM transaksi) OR kode IN (SELECT kode_item FROM transaksi WHERE aktif = 0)");
        return $query->result();
    }

     //Perumahan menengah sudah dimiliki
     function semua_dimilki(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND kode IN (SELECT kode_item FROM transaksi) AND kode IN (SELECT kode_item FROM transaksi WHERE aktif = 1)");
        return $query->result();
    }

    function tipe_elit_dimilki(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND id_tipe = 1 AND kode IN (SELECT kode_item FROM transaksi) AND kode IN (SELECT kode_item FROM transaksi WHERE aktif = 1)");
        return $query->result();
    }

    function tipe_murah_dimilki(){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE id_tipe = tipe_perumahan_menengah.id AND id_tipe = 2 AND kode IN (SELECT kode_item FROM transaksi) AND kode IN (SELECT kode_item FROM transaksi WHERE aktif = 1)");
        return $query->result();
    }

}
    
?>