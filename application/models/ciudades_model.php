<?php
class Ciudades_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function getAllCountries(){
		$query = $this->db->get('pais');
		return $query->result();
	}

	public function getAllStates(){
		$query = $this->db->get('estados');
		return $query->result();
	}

	public function getMunicipioByEstado($id){
		$query = $this->db->get_where('municipios', array('estados_id' => $id));
		return $query->result();
	}

	public function getLocalidadesByMunicipio($id){
		$query = $this->db->get_where('localidades', array('municipios_id' => $id));
		return $query->result();
	}
}
?>