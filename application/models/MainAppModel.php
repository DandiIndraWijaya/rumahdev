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

    function kode_rumah_elit(){
        return $this->db->query("SELECT * FROM perumahan_elit WHERE aktif = 0")->result();
    }

    function update_rumah($kode, $tabel){
        $this->db->query("UPDATE $tabel SET aktif = 1 WHERE kode = '$kode'");
    }

    function check($email, $kode, $tipe, $perumahan){
        $item = $perumahan . ' ' . $tipe . ' kode ' . $kode;
        return $this->db->query("SELECT email FROM pemesanan WHERE email = '$email' and item = '$item'")->row_array();
    }

    function stok_elit(){
        $query = $this->db->query("SELECT COUNT(*) as stok FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = 1 AND id_tipe = tipe_perumahan_elit.id AND kode NOT IN (SELECT kode_item FROM transaksi) OR kode IN (SELECT kode_item FROM transaksi WHERE aktif = 0)");
        $result = $query->row_array();
        return $result['stok'];
    }

    function stok_menengah(){
        $query = $this->db->query("SELECT COUNT(*) as stok FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = 2 AND id_tipe = tipe_perumahan_elit.id AND kode NOT IN (SELECT kode_item FROM transaksi) OR kode IN (SELECT kode_item FROM transaksi WHERE aktif = 0)");
        $result = $query->row_array();
        return $result['stok'];
    }

    function stok_murah(){
        $query = $this->db->query("SELECT COUNT(*) as stok FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = 3 AND id_tipe = tipe_perumahan_elit.id AND kode NOT IN (SELECT kode_item FROM transaksi) OR kode IN (SELECT kode_item FROM transaksi WHERE aktif = 0)");
        $result = $query->row_array();
        return $result['stok'];
    }

    function pesan($email, $kode, $tipe, $perumahan){
        $data = [
            'email' => $email,
            'item' => $perumahan . ' ' . $tipe . ' kode ' . $kode
        ];

        $this->db->insert('pemesanan', $data);
    }
}

?>