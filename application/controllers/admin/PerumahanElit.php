<?php

class PerumahanElit extends CI_Controller{

    public $title = "Admin: Perumahan Elit";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/perumahanelitmodel');
    }

    public function index(){
        return view('index');
    }

    public function semua_rumah(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->semua();

        return view('admin/data_perumahan/perumahan_elit/semua_rumah', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
    }

    public function tipe_elit(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_elit();

        return view('admin/data_perumahan/perumahan_elit/tipe_elit', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
        
    }

    public function tipe_menengah(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_menengah();

        return view('admin/data_perumahan/perumahan_elit/tipe_menengah', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
        
    }

    public function tipe_murah(){

        $filter = $this->perumahanelitmodel->filter();
        $data = $this->perumahanelitmodel->tipe_murah();

        return view('admin/data_perumahan/perumahan_elit/tipe_murah', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
        
    }

}

?>