<?php

class KonsumenModel extends CI_Model{
    function filter(){
        $query = $this->db->query("SELECT * FROM link_url WHERE filter_ = 'admin_konsumen' ");
        return $query->result();
    }

    function konsumen(){
        $query = $this->db->query("SELECT * FROM konsumen");
        return $query->result();
    }
    
     //Cari rumah
     function cari_rumah($kode){
        $query = $this->db->query("SELECT * FROM perumahan_menengah, tipe_perumahan_menengah WHERE  kode = '$kode' ");
        return $query->row_array();
    }

    //Update
    function update($kode, $lokasi, $tipe){
        $this->db->query("UPDATE perumahan_menengah SET kode= '$kode' , lokasi = '$lokasi', id_tipe = $tipe WHERE kode = '$kode'");
    }

    //Hapus
    function hapus($kode){
        $this->db->query("DELETE FROM perumahan_menengah WHERE kode = '$kode'");
    }

    //Ubah harga
    function ubah_harga($elit, $menengah, $murah){
        if(!empty($elit)){
            $this->db->query("UPDATE tipe_perumahan_menengah SET harga = $elit WHERE tipe = 'elit'");
        }

        if(!empty($murah)){
            $this->db->query("UPDATE tipe_perumahan_menengah SET harga = $murah WHERE tipe = 'murah'");
        }    
    }
}

?>