<?php

class TransaksiModel extends CI_Model{
    function filter(){
        $query = $this->db->query("SELECT * FROM link_url WHERE filter_ = 'transaksi' ");
        return $query->result();
    }

    function kredit(){
        $query = $this->db->query("SELECT 
        konsumen.nama_konsumen, 
        konsumen.email,
        transaksi.kode_item,
        kategori.kategori, 
        harga, 
        lama_angsuran,  
        uang_muka, 
        nominal_pembayaran, 
        angsuran_ke, 
        telah_bayar, 
        sisa_bayar, 
        tenggat_waktu
        FROM `kredit`, `konsumen`, `transaksi`, `kategori` 
        WHERE transaksi.id_kategori = kategori.id AND 
            konsumen.id = transaksi.id_konsumen AND 
            transaksi.id = id_transaksi AND transaksi.id_metode_pembayaran = 1
        ");

        return $query->result();
    }

    function kredit_lunas(){
        $query = $this->db->query("
        SELECT 
            kredit.id, 
            konsumen.nama_konsumen,
            konsumen.email, 
            transaksi.kode_item, 
            kategori.kategori, 
            harga, 
            lama_angsuran 
        FROM `kredit`, `konsumen`, `transaksi`, `kategori` 
        WHERE transaksi.id_kategori = kategori.id  AND konsumen.id = transaksi.id_konsumen AND 
            transaksi.id = id_transaksi AND transaksi.id_metode_pembayaran = 1 AND 
            sisa_bayar <= 0 
        ");

        return $query->result();
    }

    function kredit_belum_lunas(){
        $query = $this->db->query('SELECT 
        kredit.id, 
        konsumen.email,
        konsumen.nama_konsumen, 
        transaksi.kode_item, 
        kategori.kategori, 
        harga, 
        lama_angsuran 
        FROM `kredit`, `konsumen`, `transaksi`, `kategori` 
        WHERE transaksi.id_kategori = kategori.id  AND konsumen.id = transaksi.id_konsumen AND 
            transaksi.id = id_transaksi AND transaksi.id_metode_pembayaran = 1 AND 
            sisa_bayar > 0
        ');

        return $query->result();
    }

    function sewa(){
        $query = $this->db->query('SELECT 
        konsumen.nama_konsumen,
        konsumen.email,
        transaksi.kode_item,
        kategori.kategori,
        harga,
        tanggal_berakhir_sewa
        FROM `sewa`, `konsumen`, `transaksi`, `kategori` 
        WHERE transaksi.id_kategori = kategori.id AND konsumen.id = transaksi.id_konsumen AND transaksi.id = id_transaksi AND transaksi.id_metode_pembayaran = 3');

        return $query->result();
    }

    function tunai(){
        $query = $this->db->query('SELECT 
        konsumen.nama_konsumen,
        konsumen.email, 
        transaksi.kode_item, 
        kategori.kategori, 
        harga
        FROM `tunai`, `konsumen`, `transaksi`, `kategori`
        WHERE transaksi.id_kategori = kategori.id AND konsumen.id = transaksi.id_konsumen AND 
            transaksi.id = id_transaksi AND transaksi.id_metode_pembayaran = 2
        ');

        return $query->result();
    }
}

?>