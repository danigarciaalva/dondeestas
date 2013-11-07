<?php

class Nuevo extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function migrante(){
		if($_POST){
			$data['usuario'] = $this->input->post('usuario');
			$data['password'] = $this->input->post('pass');
			$data['edad'] = $this->input->post('edad');
			$data['sexo'] = $this->input->post('sexo');
			$data['nacionalidad'] = $this->input->post('nacionalidad');
			$this->load->model('migrante_model','migrantes');
			$this->migrantes->insert($data);
		}
		$this->load->model('ciudades_model','cities');
		$data['paises'] = $this->cities->getAllCountries();
		$this->load->view('nuevo_migrante_view', $data);
	}

	function usuario(){
		$this->load->view('nuevo_usuario_view');
	}

	function albergue(){
		if($_POST){
			$data['nombre'] = $this->input->post('nombre');
			$data['email'] = $this->input->post('email');
			$data['telefono'] = $this->input->post('tel');
			$data['calle'] = $this->input->post('dir');
			$data['colonia'] = $this->input->post('col');
			$data['localidades_id'] = $this->input->post('localidad');
			$usuario['usuario'] = $this->input->post('user');
			$usuario['password'] = $this->input->post('pass');
			$this->load->model('albergue_model');
			$this->albergue_model->insert($data, $usuario);
		}
		$this->load->model('ciudades_model','ciudades');
		$data['estados'] = $this->ciudades->getAllStates();
		$this->load->view('nuevo_albergue_view', $data);
	}
}
?>