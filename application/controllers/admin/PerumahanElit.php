<?php

class PerumahanElit extends CI_Controller{

    public $title = "Admin: Perumahan Elit";
    public $semua_rumah = "Semua Rumah";
    public $tersedia = "Masih Tersedia";
    public $dimiliki = "Sudah Dimiliki";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/perumahanelitmodel');
    }

    public function index(){
        return view('index');
    }

    public function semua_rumah(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->semua();
        $subfilter = "-";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
    }

    public function tipe_elit(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_elit();
        $subfilter = "Tipe Elit";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
    }

    public function tipe_menengah(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_menengah();
        $subfilter = "Tipe Menengah";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
        
    }

    public function tipe_murah(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_murah();
        $subfilter = "Tipe Murah";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
        
    }

    // Perumahaan elit masih tersedia
    public function semua_rumah_tersedia(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->semua_tersedia();
        $subfilter = "-";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
    }

    public function tipe_elit_tersedia(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_elit_tersedia();
        $subfilter = "Tipe Elit";

       return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
        
    }

    public function tipe_menengah_tersedia(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_menengah_tersedia();
        $subfilter = "Tipe Menengah";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
        
    }

    public function tipe_murah_tersedia(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_murah_tersedia();
        $subfilter = "Tipe Murah";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
        
    }

    //Perumahan elit sudah dimiliki
    public function semua_rumah_dimiliki(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->semua_dimilki();
        $subfilter = "-";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
    }

    public function tipe_elit_dimiliki(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_elit_dimilki();
        $subfilter = "Tipe Elit";

       return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
        
    }

    public function tipe_menengah_dimiliki(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_menengah_dimilki();
        $subfilter = "Tipe Menengah";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
        
    }

    public function tipe_murah_dimiliki(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_murah_dimilki();
        $subfilter = "Tipe Murah";

        return view('perusahaan/data_perumahan/perumahan_elit/data_perumahanelit_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
        
    }

    //Update data perumahan elit
    public function update_perumahanelit(){
        $filter = $this->perumahanelitmodel->filter();
        $tipe_rumah = $this->perumahanelitmodel->tipe_rumah();

        return view('perusahaan/data_perumahan/perumahan_elit/update_data_perumahanelit', ['title' => $this->title, 'filter' => $filter, 'tipe_rumah' => $tipe_rumah]);
    }

    //Tambah rumah
    public function tambah_rumah(){
        $kode = $this->input->get('kode');
        $lokasi = $this->input->get('lokasi');
        $tipe = $this->input->get('tipe');

        $this->perumahanelitmodel->tambah_rumah($kode, $lokasi, $tipe);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rumah dengan kode '
        . $kode. ' berhasil ditambah!</div>');

        redirect('admin/perumahanelit/update_perumahanelit');
    }

    //Cari rumah untuk diupdate
    public function cari_rumah(){
        $filter = $this->perumahanelitmodel->filter();
        $kode = $this->input->get("cari");
        $hasil_cari = $this->perumahanelitmodel->cari_rumah($kode);
        $tipe_rumah = $this->perumahanelitmodel->tipe_rumah();

        
        return view('perusahaan/data_perumahan/perumahan_elit/update_data_perumahanelit', ['title' => $this->title, 'filter' => $filter, 'tipe_rumah' => $tipe_rumah, 'hasil_cari' => $hasil_cari, 'kode' => $kode]);
    }

    //Update rumah
    public function update(){
        $kode1 = $this->input->get('kode1');
        $kode = $this->input->get('kode');
        $lokasi = $this->input->get('lokasi');
        $tipe = $this->input->get('tipe');

        $this->perumahanelitmodel->update($kode, $lokasi, $tipe);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rumah dengan kode '
        . $kode1. ' berhasil diubah!</div>');
        
        redirect('admin/perumahanelit/update_perumahanelit');
    }

    //Hapus rumah
    public function hapus(){
        $kode = $this->input->get('kode_hapus');
        
        $this->perumahanelitmodel->hapus($kode);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rumah dengan kode '
        . $kode. ' berhasil dihapus!</div>');

        redirect('admin/perumahanelit/update_perumahanelit');
    }

    //Ubah harga
    public function ubah_harga(){
        $elit = $this->input->get('tipe_elit');
        $menengah = $this->input->get('tipe_menengah');
        $murah = $this->input->get('tipe_murah');

        $this->perumahanelitmodel->ubah_harga($elit, $menengah, $murah);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data harga perumahan elit berhasil diubah!</div>');

        redirect('admin/perumahanelit/update_perumahanelit');

    }

}

?>