<?php

class Transaksi extends CI_Controller{

    public $title = "Admin: Transaksi";
    public $kredit = 'Kredit';
    public $kredit_lunas = 'Kredit Lunas';
    public $kredit_belum_lunas = 'Kredit Belum Lunas';
    public $sewa_apartemen = 'Sewa Apartemen';
    public $tunai = 'Tunai';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/transaksimodel');
    }

    public function kredit(){
        $filter = $this->transaksimodel->filter();
        $data = $this->transaksimodel->kredit();

        return view('perusahaan/transaksi/data_transaksi_kredit', ['filter' => $filter, 'data' => $data, 'c_filter' => $this->kredit, 'title' => $this->title]);
    }

    public function kredit_lunas(){
        $filter = $this->transaksimodel->filter();
        $data = $this->transaksimodel->kredit_lunas();

        return view('perusahaan/transaksi/data_kredit_lunas', ['filter' => $filter, 'data' => $data, 'c_filter' => $this->kredit_lunas, 'title' => $this->title]);

    }

    public function kredit_belum_lunas(){
        $filter = $this->transaksimodel->filter();
        $data = $this->transaksimodel->kredit_belum_lunas();

        return view('perusahaan/transaksi/data_kredit_belum_lunas', ['filter' => $filter, 'data' => $data, 'c_filter' => $this->kredit_belum_lunas, 'title' => $this->title]);
    }

    public function sewa_apartemen(){
        $filter = $this->transaksimodel->filter();
        $data = $this->transaksimodel->sewa();

        return view('perusahaan/transaksi/data_sewa_apartemen', ['filter' => $filter, 'data' => $data, 'c_filter' => $this->sewa_apartemen, 'title' => $this->title]);
    } 

    public function bayar_tunai(){
        $filter = $this->transaksimodel->filter();
        $data = $this->transaksimodel->tunai();

        return view('perusahaan/transaksi/data_bayar_tunai', ['filter' => $filter, 'data' => $data, 'c_filter' => $this->tunai, 'title' => $this->title]);
    }
}

?>