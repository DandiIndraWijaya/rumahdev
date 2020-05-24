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

}

?>