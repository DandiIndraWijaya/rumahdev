<?php

class PembayaranModel extends CI_Model{
    function filter(){
        $query = $this->db->query("SELECT * FROM link_url WHERE filter_ = 'pembayaran' ");
        return $query->result();
    }
    
    function konsumen($id_konsumen){
        $query = $this->db->query("SELECT * FROM konsumen WHERE id = $id_konsumen");
        return $query->row_array();
    }

    function metode_pembayaran(){
        $query = $this->db->query("SELECT * FROM metode_pembayaran");
        return $query->result();
    }

    function kategori(){
        $query = $this->db->query("SELECT * FROM kategori");
        return $query->result();
    }

    function insert_transaksi($id_konsumen, $kode_item, $metode_pembayaran, $kategori, $aktif){
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
        ];

        $this->db->set('kode_bukti_pembayaran', 'UUID()', FALSE);
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

    function update_kredit($angsuran_ke, $uang, $id_kredit){
        $query = $this->db->query("UPDATE kredit SET angsuran_ke = $angsuran_ke, telah_bayar = telah_bayar + $uang, sisa_bayar = sisa_bayar - $uang WHERE id = $id_kredit");
    }

    function transaksi($id_konsumen, $kode_item){
        $query = $this->db->query("SELECT * FROM transaksi WHERE id_konsumen = $id_konsumen AND kode_item = '$kode_item'");

        return $query->row_array();
    }

    function bayar_tunai($id_transaksi, $uang){
        $data_transaksi_tunai = [
            'id_transaksi' => $id_transaksi,
            'harga' => $uang
        ];

        $this->db->set('kode_bukti_pembayaran', 'UUID()', FALSE);
        $this->db->insert('tunai', $data_transaksi_tunai);
    }

    function bukti_pembayaran_tunai($id_transaksi){
        $query = $this->db->query("SELECT * FROM tunai WHERE id_transaksi = $id_transaksi");
        return $query->row_array();
    }

    function bayar_sewa($id_transaksi, $uang){
        $data_transaksi_tunai = [
            'id_transaksi' => $id_transaksi,
            'harga' => $uang,
        ];
        $this->db->set('tanggal_berakhir_sewa', 'CURDATE()', FALSE);
        $this->db->set('kode_bukti_pembayaran', 'UUID()', FALSE);
        $this->db->insert('sewa', $data_transaksi_tunai);
    }

    function bukti_pembayaran_sewa($id_transaksi){
        $query = $this->db->query("SELECT * FROM sewa WHERE id_transaksi = $id_transaksi");
        $result = $query->row_array();
        $kode_bukti = $result['kode_bukti_pembayaran'];
        
        $this->db->query("UPDATE sewa SET tanggal_berakhir_sewa = DATE_ADD(`tanggal_berakhir_sewa` , INTERVAL 1 YEAR) WHERE kode_bukti_pembayaran = '$kode_bukti'");

        $query1 = $this->db->query("SELECT * FROM sewa WHERE id_transaksi = $id_transaksi");
        $result1 = $query1->row_array();
        $tanggal_berakhir = $result1['tanggal_berakhir_sewa'];

        return [$kode_bukti, $tanggal_berakhir];
    }

}

?>