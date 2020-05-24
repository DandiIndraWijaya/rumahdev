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

}

?>