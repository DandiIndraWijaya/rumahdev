<?php

class Profil extends CI_Controller{
    protected $konsumen;
    protected $transaksi;
    protected $pengguna;
    protected $tab = "Rumahdev.id";

    public function __construct()
    {
       
        parent::__construct();
        if(empty($this->session->userdata('email'))){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harus login terlebih dahulu!</div>');
            redirect('authentication');
        }else{
            $this->pengguna = $this->session->userdata('email');
        }

        $this->load->model('konsumen/transaksimodel');

        $this->konsumen = $this->transaksimodel->konsumen($this->session->userdata('email'));
        $this->transaksi = $this->transaksimodel->transaksi($this->konsumen['id']);
    }
    public function index(){
        

        return view('konsumen/profil', ['pengguna' => $this->pengguna, 'tab' => $this->tab, 'konsumen' => $this->konsumen, 'transaksi' => $this->transaksi]);
    }
    
}

?>