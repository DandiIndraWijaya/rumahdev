<?php

class PembayaranModel extends CI_Model{
    function filter(){
        $query = $this->db->query("SELECT * FROM link_url WHERE filter_ = 'pembayaran' ");
        return $query->result();
    }

    function metode_pembayaran(){
        $query = $this->db->query("SELECT * FROM metode_pembayaran");
        return $query->result();
    }

    function kategori(){
        $query = $this->db->query("SELECT * FROM kategori");
        return $query->result();
    }

    function harga($kode_item, $kategori){
        
        if($kategori == 1){
            $query = $this->db->query("SELECT harga FROM perumahan_elit, tipe_perumahan_elit WHERE perumahan_elit.id_tipe = tipe_perumahan_elit.id AND kode = '$kode_item'");

            return $query->row_array();

        }elseif($kategori == 2){
            $query = $this->db->query("SELECT harga FROM perumahan_menengah, tipe_perumahan_menengah WHERE perumahan_menengah.id_tipe = tipe_perumahan_menengah.id AND kode = '$kode_item'");

            return $query->row_array();

        }else{
            $query = $this->db->query("SELECT harga FROM perumahan_elit, tipe_perumahan_elit WHERE perumahan_elit.id_tipe = tipe_perumahan_elit.id AND kode = '$kode_item'");

            return $query->row_array();
        }
    }
}

?>