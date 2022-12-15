<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GET extends SEKOLAH_Controller {

	function __construct(){
		parent::__construct();

		if ($_SERVER['REQUEST_METHOD'] != 'GET') {
			echo skl_response(405, $title="Error", array(), getCodeText(405));
			exit;
		}
	}

	public function murid(){
		
		$this->load->model('M_crud');
		$where = array(
			'id_user' => $this->input->get('id_user')
		);
		$resp = $this->M_crud->pub_multi_where('skl_master_murid', $where);
		$data = array(
			'nik' => $resp->row()->nik,
			'id_user' => $resp->row()->id_user,
			'id_sekolah' => $resp->row()->id_sekolah,
			'nama' => $resp->row()->nama,
			'alamat' => $resp->row()->alamat,
			'telepon' => $resp->row()->alamat,
			'image' => $resp->row()->image,
		);
		$title = 'Get Murid';
		$code = ($resp->num_rows() > 0) ? 200 : 404;
		echo skl_response($code, $title, $data, getCodeText($code));
		
	}


}
