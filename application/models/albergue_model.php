<?php
class Albergue_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function insert($data, $usuario){
		$this->db->insert('usuario',$usuario);
		$id = $this->db->get_where('usuario', array('usuario'=>$usuario['usuario']))->result()[0]->id_usuario;
		$data['encargado'] = $id;
		$this->db->insert('albergue',$data);
	}

	function getAlbergue($id){
		$query = $this->db->get_where('albergue',array('id_albergue' => $id));
		return $query->result()[0];
	}

}
?>