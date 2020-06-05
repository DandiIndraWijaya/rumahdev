<?php

class Perumahan extends CI_Controller{
    protected $tab = "Rumahdev.id";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mainappmodel');
    }

    public function perumahan_elit(){
        $title = "Detail Perumahan Elit";
        $perumahan = $this->mainappmodel->tipe_perumelit();

        return view('konsumen/detail_perumahan',['tab' => $this->tab, 'perumahan' => $perumahan, 'title' => $title]);
    }
}

?>