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

    //Tipe perumahan menengah
    function tipe_rumah(){
        $query = $this->db->query("SELECT * FROM tipe_perumahan_menengah");
        return $query->result();
    }

    //Tambah rumah
    function tambah_rumah($kode, $lokasi, $tipe){
        $data = [
            'kode' => $kode,
            'lokasi' => $lokasi,
            'id_tipe' => $tipe
        ];

        $this->db->insert('perumahan_menengah', $data);
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