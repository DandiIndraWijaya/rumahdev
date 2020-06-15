<?php
class TransaksiModel extends CI_Model{
    function konsumen($email){
        return $this->db->query("SELECT * FROM konsumen WHERE email = '$email'")->row_array();
    }

    function transaksi($id_konsumen){
        return $this->db->query("SELECT * FROM transaksi, metode_pembayaran, kategori WHERE id_konsumen = $id_konsumen AND transaksi.id_metode_pembayaran = metode_pembayaran.id AND transaksi.id_kategori = kategori.id")->result();
    }
}


?>