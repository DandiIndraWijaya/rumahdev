<?php

class PerumahanMenengah extends CI_Controller{

    public $title = "Admin: Perumahan Menengah";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/perumahanmenengahmodel');
    }

    public function index(){
        return view('index');
    }

    public function semua_rumah(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->semua();

        return view('admin/data_perumahan/perumahan_menengah/semua_rumah', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
    }

    public function tipe_elit(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_elit();

        return view('admin/data_perumahan/perumahan_menengah/tipe_elit', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
        
    }

    public function tipe_murah(){

        $filter = $this->perumahanmenengahmodel->filter();
        $data = $this->perumahanmenengahmodel->tipe_murah();

        return view('admin/data_perumahan/perumahan_menengah/tipe_murah', ['data' => $data, 'title' => $this->title, 'filter' => $filter]);
        
    }

}

?>