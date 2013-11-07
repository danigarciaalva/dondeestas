<?php
class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view('login_view');
	}

	function login(){
		$data['user'] = "Daniel";
		$data['albergue'] = 1;
		$this->session->set_userdata('sesion',$data);
		redirect('/principal/');
	}
}
?>