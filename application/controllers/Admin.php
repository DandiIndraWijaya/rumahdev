<?php

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rumahelit');
    }

    public function index(){
        return view('index');
    }

    public function semua_rumah_elit(){
        $data = $this->rumahelit->semua();
        return view('admin/data_perumahan/semua_rumah_elit', ['data' => $data]);
    }
}

?>