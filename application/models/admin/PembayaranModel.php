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
            'angsuran_ke' => 1,
            'telah_bayar' => 0,
            'sisa_bayar' => $sisa_harga
        ];

        $insert = $this->db->insert('kredit', $data_kredit_awal);
        if(!$insert){
            echo "ERROR Insert kredit awal";
        }
    }

    function cari_id_kredit($id_konsumen, $kode_item){
        $query_id_transaksi = $this->db->query("SELECT * FROM transaksi WHERE id_konsumen = $id_konsumen AND kode_item = '$kode_item'")->row_array();

        $id_transaksi = $query_id_transaksi['id'];

        $query_kredit = $this->db->query("SELECT * FROM kredit WHERE id_transaksi = $id_transaksi")->row_array();

        $id_kredit = $query_kredit['id'];
        $angsuran_ke = $query_kredit['angsuran_ke'];

        return ['id_kredit' => $id_kredit, 'angsuran_ke' => $angsuran_ke];
    }

    function transaksi_kredit($id_kredit, $angsuran_ke){
        $data_transaksi_kredit = [
            'id_kredit' => $id_kredit,
            'angsuran_ke' => $angsuran_ke,
            'kode_bukti_pembayaran' => UUID()
        ];

        $this->db->insert('transaksi_kredit', $data_transaksi_kredit);

    }

    function bukti_pembayaran($id_kredit, $angsuran_ke){
        $query = $this->db->query("SELECT kode_bukti_pembayaran FROM transaksi_kredit WHERE id_kredit = $id_kredit AND angsuran_ke = $angsuran_ke");

        return $query->row_array();
    }

    function pembayaran($kode_bukti, $uang){
        $data_pembayaran = [
            'kode_bukti_pembayaran' => $kode_bukti,
            'jumlah_pembayaran' => $uang
        ];

        $this->db->insert('pembayaran', $data_pembayaran);
    }


}

?>