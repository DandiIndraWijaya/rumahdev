<?php

class Pembayaran extends CI_Controller{

    public $title = "Admin: Pembayaran";
    public $kredit = "Kredit";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/pembayaranmodel');
    }

    public function kredit(){
        $filter = $this->pembayaranmodel->filter();
        $metode_pembayaran = $this->pembayaranmodel->metode_pembayaran();
        $kategori = $this->pembayaranmodel->kategori();

        return view('admin/pembayaran/bayar_kredit', ['title' => $this->title, 'filter' => $filter, 'metode_pembayaran' => $metode_pembayaran, 'kategori' => $kategori, 'c_filter' => $this->kredit]);
    }

    public function transaksi_kredit(){
        $filter = $this->pembayaranmodel->filter();

        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $metode_pembayaran = 1;
        $kategori = $this->input->post('kategori');
        $aktif = 1;
        
        $this->pembayaranmodel->insert_transaksi_kredit($id_konsumen, $kode_item, $metode_pembayaran, $kategori, $aktif);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data transaksi kredit berhasil disimpan!</div>');
        
        redirect('admin/pembayaran/kredit');
    }

    public function kredit_awal(){
        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $lama_angsuran = $this->input->post('lama_angsuran');
        $periode = $this->input->post('periode');
        $uang_muka = $this->input->post('uang_muka');

        $lama_angsuran2 = $lama_angsuran . ' ' . $periode;

        $result = $this->pembayaranmodel->harga($id_konsumen, $kode_item);
        $harga = $result['harga'];
        $id_transaksi = $result['id'];
        $sisa_harga = $harga - $uang_muka;

        if($periode == 'bulan'){
            $nominal_pembayaran = round($sisa_harga / $lama_angsuran);
            $jumlah_angsuran = $lama_angsuran;
        }else{
            $lama_angsuran3 = $lama_angsuran * 12;
            $nominal_pembayaran = round($sisa_harga / $lama_angsuran3);
            $jumlah_angsuran = $lama_angsuran3;
        }

        $this->pembayaranmodel->insert_kredit_awal($id_transaksi, $harga, $sisa_harga, $lama_angsuran2, $uang_muka, $jumlah_angsuran, $nominal_pembayaran);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kredit awal berhasil disimpan!</div>');
        
        redirect('admin/pembayaran/kredit');
    }

}

?>