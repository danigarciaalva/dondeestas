<?php
class Migrante extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function insert($migrante){
		$this->db->insert('migrantes', $migrante);
	}

	function getAbusos(){
		$query = $this->db->get('abuso');
		return $query->result();
	}

	function insert_visita($data){
		$resultado = $this->db->get_where('migrantes',array('usuario' => $data['user'], 'password' => $data['pass']))->result();
		$id = $resultado->row(0)->id;
		$visita['abuso_id_abuso'] = $data['abuso_id_abuso'];
		$visita['descripcion'] = $data['descripcion'];
		$visita['migrantes_id'] = $id;
		$sesion = $this->session->userdata('sesion');
		$visita['albergue_id_albergue'] = $sesion['albergue'];
		$this->db->insert('visita',$visita);
	}

	function getVisitas($id){
		$visitas = $this->db->get_where('visita',array('migrantes_id' => $id))->result();
		$localidades = array();
		foreach ($visitas as $visita) {
			$albergue = $this->db->get_where('albergue', array('id_albergue' => $visita->albergue_id_albergue))->result()->row(0);
			$localidad = $this->db->get_where('localidades', array('id_localidades' => $albergue->localidades_id))->result()->row(0);
			array_push($localidades, $localidad);
		}
		return $localidades;

	}

	function getMigrantes(){
		$this->db->select('id, usuario');
		return $this->db->get('migrantes')->result();
	}
}


?>
