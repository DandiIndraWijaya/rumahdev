<?php

class PerumahanMenengah extends CI_Controller{

    public $title = "Admin: Perumahan Menengah";
    public $semua_rumah = "Semua Rumah";
    public $tersedia = "Masih Tersedia";
    public $dimiliki = "Sudah Dimiliki";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/perumahanmenengahmodel');
    }

    public function index(){
        return view('index');
    }

    public function semua_rumah(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->semua();
        $subfilter = "-";

        return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
    }

    public function tipe_elit(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_elit();
        $subfilter = "Tipe Elit";

        return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
        
    }

    public function tipe_murah(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_murah();
        $subfilter = "Tipe Murah";

         return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->semua_rumah, 'subfilter' => $subfilter]);
        
    }


    //Perumahan menengah tersedia
    public function semua_rumah_tersedia(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->semua_tersedia();
        $subfilter = "-";

        return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
    }

    public function tipe_elit_tersedia(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_elit_tersedia();
        $subfilter = "Tipe Elit";

        return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
        
    }

    public function tipe_murah_tersedia(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_murah_tersedia();
        $subfilter = "Tipe Murah";

         return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah_tersedia', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->tersedia, 'subfilter' => $subfilter]);
        
    }

    //Perumahan menengah sudah dimiliki
    public function semua_rumah_dimiliki(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->semua_dimilki();
        $subfilter = "-";

        return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
    }

    public function tipe_elit_dimiliki(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_elit_dimilki();
        $subfilter = "Tipe Elit";

       return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
        
    }

    public function tipe_murah_dimiliki(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_murah_dimilki();
        $subfilter = "Tipe Murah";

        return view('perusahaan/data_perumahan/perumahan_menengah/data_perumahanmenengah_dimiliki', ['data' => $data, 'title' => $this->title, 'filter' => $filter, 'c_filter' => $this->dimiliki, 'subfilter' => $subfilter]);
        
    }

    //Update data perumahan elit
    public function update_perumahanmenengah(){
        $filter = $this->perumahanmenengahmodel->filter();
        $tipe_rumah = $this->perumahanmenengahmodel->tipe_rumah();

        return view('perusahaan/data_perumahan/perumahan_menengah/update_data_perumahanmenengah', ['title' => $this->title, 'filter' => $filter, 'tipe_rumah' => $tipe_rumah]);
    }

    //Tambah rumah
    public function tambah_rumah(){
        $kode = $this->input->get('kode');
        $lokasi = $this->input->get('lokasi');
        $tipe = $this->input->get('tipe');

        $this->perumahanmenengahmodel->tambah_rumah($kode, $lokasi, $tipe);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rumah dengan kode '
        . $kode. ' berhasil ditambah!</div>');

        redirect('admin/perumahanmenengah/update_perumahanmenengah');
    }

    //Cari rumah untuk diupdate
    public function cari_rumah(){
        $filter = $this->perumahanmenengahmodel->filter();
        $kode = $this->input->get("cari");
        $hasil_cari = $this->perumahanmenengahmodel->cari_rumah($kode);
        $tipe_rumah = $this->perumahanmenengahmodel->tipe_rumah();

        return view('perusahaan/data_perumahan/perumahan_menengah/update_data_perumahanmenengah', ['title' => $this->title, 'filter' => $filter, 'tipe_rumah' => $tipe_rumah, 'hasil_cari' => $hasil_cari, 'kode' => $kode]);
    }

    //Update rumah
    public function update(){
        $kode1 = $this->input->get('kode1');
        $kode = $this->input->get('kode');
        $lokasi = $this->input->get('lokasi');
        $tipe = $this->input->get('tipe');

        $this->perumahanmenengahmodel->update($kode, $lokasi, $tipe);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rumah dengan kode '
        . $kode1. ' berhasil diubah!</div>');
        
        redirect('admin/perumahanmenengah/update_perumahanmenengah');
    }

    //Hapus rumah
    public function hapus(){
        $kode = $this->input->get('kode_hapus');
        
        $this->perumahanmenengahmodel->hapus($kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data rumah dengan kode '
        . $kode. ' berhasil dihapus!</div>');

        redirect('admin/perumahanmenengah/update_perumahanmenengah');
    }

    //Ubah harga
    public function ubah_harga(){
        $elit = $this->input->get('tipe_elit');
        $murah = $this->input->get('tipe_murah');

        $this->perumahanmenengahmodel->ubah_harga($elit, $murah);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data harga perumahan elit berhasil diubah!</div>');

        redirect('admin/perumahanmenengah/update_perumahanmenengah');

    }

}

?>