<?php
class Rutas extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->model('migrante_model','migrantes');
		$data['migrantes'] = $this->migrantes->getMigrantes();
		$this->load->view('rutas_view', $data);
		$this->load->view('rutas_view');
	}
}
?>