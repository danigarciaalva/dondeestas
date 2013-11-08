<?php
class Rutas extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('migrante');
	}

	function index(){
		
		$data['migrantes'] = $this->migrante->getMigrantes();
		$this->load->view('rutas_view', $data);
		//$this->load->view('rutas_view');
	}
}
?>