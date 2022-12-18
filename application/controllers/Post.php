<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends SEKOLAH_Controller {

	function __construct(){
		parent::__construct();

		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			echo skl_response(405, $title="Error", array(), getCodeText(405));
			exit;
		}
	}

	public function login(){
		
		//print_r($this->input->post());
		$this->load->model('M_crud');

		$where = array(
			'username' => $this->input->post('username'),
			'password' => MD5($this->input->post('password'))
			// 'password' => $this->input->post('password')
		);

		$resp = $this->M_crud->pub_multi_where('skl_master_user', $where);

		$title = 'Get User';
		$data = ($resp->num_rows() > 0) ? array(
			'id_user' => $resp->row()->id,
			'username' => $resp->row()->username
		) : array();
		// $data = (count($resp) > 0) ? $resp[0]  : 0 ;
		$code = ($resp->num_rows() > 0) ? 200 : 404;
		// $code = (count($resp)  > 0) ? 200 : 404;
		// count($query) 
		echo skl_response($code, $title, $data, getCodeText($code));
		
	}



	public function addabsen(){
		
		//print_r($this->input->post());
		$this->load->model('M_crud');

		$where = array(
			'username' => $this->input->post('username'),
			'password' => MD5($this->input->post('password'))
			// 'password' => $this->input->post('password')
		);

		$resp = $this->M_crud->pub_multi_where('skl_master_user', $where);

		$title = 'Get User';
		$data = ($resp->num_rows() > 0) ? array(
			'id_user' => $resp->row()->id,
			'username' => $resp->row()->username
		) : array();
		// $data = (count($resp) > 0) ? $resp[0]  : 0 ;
		$code = ($resp->num_rows() > 0) ? 200 : 404;
		// $code = (count($resp)  > 0) ? 200 : 404;
		// count($query) 
		echo skl_response($code, $title, $data, getCodeText($code));
		
	}


	


}
