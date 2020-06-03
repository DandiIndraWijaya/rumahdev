<?php

class Konsumen extends CI_Controller{
    public $title = "Admin: Konsumen";
    public $data = 'Data';
    public $update = 'Update';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/konsumenmodel');
    }

    public function index(){
        $filter = $this->konsumenmodel->filter();
        $konsumen = $this->konsumenmodel->konsumen();

        return view('perusahaan/konsumen/data_konsumen', ['title' => $this->title, 'filter' => $filter, 'c_filter' => $this->data, 'data' => $konsumen]);
    }

     //Update data perumahan elit
     public function update_konsumen(){
        $filter = $this->konsumenmodel->filter();
        
        return view('perusahaan/konsumen/update_data_konsumen', ['title' => $this->title, 'filter' => $filter, ]);
    }

    //Tambah rumah
    public function tambah_konsumen(){
        $kode = $this->input->get('kode');
        $lokasi = $this->input->get('lokasi');
        $tipe = $this->input->get('tipe');

        $this->konsumenmodel->tambah_rumah($kode, $lokasi, $tipe);

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