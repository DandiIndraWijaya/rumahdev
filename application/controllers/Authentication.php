<?php

class Authentication extends CI_Controller{
    protected $title = 'authentication';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthenticationModel');

    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if(!empty($this->session->userdata('email'))){
            redirect('');
        }
        if ($this->form_validation->run() == false) {
            return view('auth/login', ['title' => $this->title]);
        } else {
            $this->_login();
        }
    }

    public function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $pengguna = $this->AuthenticationModel->login($email);

        if ($pengguna) {
                if ($password == $pengguna['password']){
                    $data = [
                        'email' => $email,
                        'role_id' => $pengguna['hak_akses']
                    ];
                    $this->session->set_userdata($data);
                    if ($pengguna['hak_akses'] == 1) {
                        redirect('');
                    } else if ($pengguna['hak_akses'] == 2) {
                        redirect('admin/perumahanelit/semua_rumah');
                    } else {
                        redirect('murid');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!</div>');
                    redirect('Authentication');
                }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
            redirect('Authentication');
        }
    }

    public function register(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sesuai!']);
        
    
        if ($this->form_validation->run() == false) {
            return view('auth/register', ['title' => $this->title]);
        }else{
            $this->_register();
        }
    }

    public function _register(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $check = $this->AuthenticationModel->check($email);
        $check2 = $this->AuthenticationModel->check2($email);
        if(empty($check)){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda daftarkan belum melakukan transaksi!</div>');
            redirect('authentication/register');
        }else{
            if(!empty($check2)){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda daftarkan sudah terdaftar!</div>');

                redirect('authentication/register');
            }else{
                $this->AuthenticationModel->insert_data($email, $password);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil daftar, silahkan login!</div>');
                redirect('authentication');
            }
        }
    }

	public function logout(){
		$this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        
        redirect('authentication');
	}
}

?>