<?php

class Perumahan extends CI_Controller{
    protected $tab = "Rumahdev.id";
    protected $pengguna;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mainappmodel');
        if(!empty($this->session->userdata('email'))){
            $this->pengguna = $this->session->userdata('email');
        }
    }

    public function perumahan_elit(){
        $title = "Detail Perumahan Elit";
        $perumahan = $this->mainappmodel->tipe_perumelit();

        return view('konsumen/detail_perumahan',['tab' => $this->tab, 'perumahan' => $perumahan, 'title' => $title, 'pengguna' => $this->pengguna]);
    }
}

?>