<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

		public $tab = 'Rumahdev.id';

		public function __construct()
		{
			parent::__construct();
			$this->load->model('mainappmodel');
		}
	
		public function index(){
			$perumelit = $this->mainappmodel->tipe_perumelit();
			$perummenengah = $this->mainappmodel->tipe_perummenengah();
			$apartemen = $this->mainappmodel->apartemen();
	
			return view('konsumen/home', ['tab' => $this->tab, 'perumelit' => $perumelit, 'perummenengah' => $perummenengah, 'apartemen' => $apartemen]);
		}
	
}
