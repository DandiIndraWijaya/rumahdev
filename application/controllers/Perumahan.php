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

    public function pesan(){
        $perumahan = $this->input->post('perumahan');
        $tabel = $this->input->post('tabel');
        $kode = $this->input->post('kode');
        $email = $this->input->post('email');
        $tipe = $this->input->post('tipe');

        $chek = $this->mainappmodel->check($email, $kode, $tipe, $perumahan);

        if(empty($chek)){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email anda telah melakukan pemesanan rumah yang anda pilih. Pilih rumah lain atau Segera lanjutkan proses transakasi</div>');

            redirect('');
        }else{
            $this->_sendEmail($perumahan, $kode, $email, $tipe);
            $this->mainappmodel->update_rumah($kode, $tabel);
            $this->mainappmodel->pesan($email, $kode, $tipe, $tabel, $perumahan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! anda berhasil memesan</div>');
            redirect('');
        }
    }

    private function _sendEmail($perumahan, $kode, $email, $tipe){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'dandiindra29@gmail.com',
            'smtp_pass' => '123jadidandi',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

            $this->email->from('dandiindra29@gmail.com', 'Rumahdev');
            $this->email->to($email);
            $this->email->subject('Pemesananan ' . $perumahan);
            $this->email->message('Anda telah melakukan pemesanan rumah tipe ' . $tipe . ' dengan kode ' . $kode .'. Segera hubungi xxxxx9008987 untuk melakukan transaksi karena pemesanann ini akan hangus setelah 24 jam dari dikrimnya email ini.');

            if ($this->email->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();
                die;
            }
        
    }

    public function perumahan_elit(){
        $title = "Detail Perumahan Elit";
        $tipe = $this->mainappmodel->tipe_perumelit();
        $kode_rumah = $this->mainappmodel->kode_rumah_elit();
        $perumelit = "Perumahan Elit";
        $tabel = 'perumahan_elit';

        return view('konsumen/detail_perumahan',['tab' => $this->tab, 'tipe' => $tipe, 'title' => $title, 'pengguna' => $this->pengguna, 'kode' => $kode_rumah, 'perumahan' => $perumelit, 'tabel' => $tabel]);
    }
}

?>