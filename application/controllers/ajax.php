<?php

class Ajax extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function getMunicipiosByState(){
		$id = $this->input->post('id_estado');
		$this->load->model('ciudades_model','cities');
		$result = $this->cities->getMunicipioByEstado($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode(array($result)));
	}

	function getLocalidadesByMun(){
		$id = $this->input->post('id_municipio');
		$this->load->model('ciudades_model','cities');
		$result = $this->cities->getLocalidadesByMunicipio($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode(array($result)));
	}	

	function getVisitas(){
		$id = $this->input->get('id');
		$this->load->model('migrante_model');
		$query = $this->migrante_model->getVisitas($id);
		return $this->output->set_content_type('application/json')->set_output(json_encode($query));
	}
}
?>