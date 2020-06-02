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

    public function kredit_awal(){
        $filter = $this->pembayaranmodel->filter();

        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $metode_pembayaran = 1;
        $kategori = $this->input->post('kategori');
        $lama_angsuran = $this->input->post('lama_angsuran');
        $uang_muka = $this->input->post('uang_muka');
        $aktif = 1;
        $periode = $this->input->post('periode');

        $harga = $this->pembayaranmodel->harga($kode_item, $kategori);

        if($periode == 'bulan'){
            $nominal_pembayaran = $harga / $lama_angsuran;
        }

    }

}

?>