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

    function insert_transaksi_kredit($id_konsumen, $kode_item, $metode_pembayaran, $kategori, $aktif){

        $data_transaksi = [
            'id_konsumen' => $id_konsumen,
            'kode_item' => $kode_item,
            'id_metode_pembayaran' => $metode_pembayaran,
            'id_kategori' => $kategori,
            'aktif' => $aktif
        ];

        $this->db->insert('transaksi', $data_transaksi);
    }

    function harga($id_konsumen, $kode_item){

        $query = $this->db->query("SELECT * FROM transaksi WHERE id_konsumen = $id_konsumen AND kode_item = '$kode_item'")->row_array();

        $id = $query['id'];

        if($query['id_kategori'] == 1){
            $query = $this->db->query("SELECT harga FROM perumahan_elit, tipe_perumahan_elit WHERE perumahan_elit.id_tipe = tipe_perumahan_elit.id AND kode = '$kode_item'");

            $result= $query->row_array();
            $harga = $result['harga'];

        }elseif($query['id_kategori'] == 2){
            $query = $this->db->query("SELECT harga FROM perumahan_menengah, tipe_perumahan_menengah WHERE perumahan_menengah.id_tipe = tipe_perumahan_menengah.id AND kode = '$kode_item'");

            $result= $query->row_array();
            $harga = $result['harga'];

        }else{
            $query = $this->db->query("SELECT harga FROM perumahan_elit, tipe_perumahan_elit WHERE perumahan_elit.id_tipe = tipe_perumahan_elit.id AND kode = '$kode_item'");

            $result= $query->row_array();
            $harga = $result['harga'];
        }

        return ['harga' => $harga, 'id' => $id];
        
    }

    function insert_kredit_awal($id_transaksi, $harga, $sisa_harga, $lama_angsuran2, $uang_muka, $jumlah_angsuran, $nominal_pembayaran){
        $data_kredit_awal = [
            'id_transaksi' => $id_transaksi,
            'harga' => $harga,
            'uang_muka' => $uang_muka,
            'lama_angsuran' => $lama_angsuran2,
            'nominal_pembayaran' => $nominal_pembayaran,
            'jumlah_angsuran' => $jumlah_angsuran,
            'angsuran_ke' => 0,
            'telah_bayar' => 0,
            'sisa_bayar' => $sisa_harga
        ];

        $insert = $this->db->insert('kredit', $data_kredit_awal);
        if(!$insert){
            echo "ERROR Insert kredit awal";
        }
    }


}

?>