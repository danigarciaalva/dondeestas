<?php
class Principal extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){
		if($_POST){
			$data['user'] = $this->input->post('user');
			$data['pass'] = $this->input->post('pass');
			$data['abuso_id_abuso'] = $this->input->post('abuso');
			$data['descripcion'] = $this->input->post('comentario');
			$this->load->model('migrante_model');
			$this->migrante_model->insert_visita($data);
		}
		$sesion['user'] = "Daniel";
		$sesion['albergue'] = 7;
		$this->session->set_userdata('sesion',$sesion);

		$this->load->model('migrante_model');
		$this->load->model('albergue_model');
		$albergue = $this->albergue_model->getAlbergue($this->session->userdata('sesion')['albergue']);
		$data['abusos'] = $this->migrante_model->getAbusos();
		$data['albergue'] = $albergue;
		$this->load->view('principal_view',$data);
	}
}
?>