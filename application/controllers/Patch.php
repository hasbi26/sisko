<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PATCH extends SEKOLAH_Controller {

	function __construct(){
		parent::__construct();

		if ($_SERVER['REQUEST_METHOD'] != 'PATCH') {
			echo skl_response(405, $title="Error", array(), getCodeText(405));
			exit;
		}
	}

	public function guruByNip($nip){
		
		$body = json_validator(file_get_contents('php://input'));

		if(!$body){
			$title = 'Update Guru By NIP';
			$code = 400;
			$data = array();
		}

		$resp = $this->M_crud->pub_update_where('skl_master_guru', $body, array('nip' => $nip));
		//var_dump($resp);exit;
		$title = 'Update Guru By NIP';
		$code = 200;
		$data = array();

		if(!$resp){
			$title = 'Update Guru By NIP';
			$code = 204;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function pelajaranById($Id){
		
		$body = json_validator(file_get_contents('php://input'));

		if(!$body){
			$title = 'Update Pelajaran By ID';
			$code = 400;
			$data = array();
		}

		$resp = $this->M_crud->pub_update_where('skl_master_pelajaran', $body, array('id_pelajaran' => $Id));
		//var_dump($resp);exit;
		$title = 'Update Pelajaran By ID';
		$code = 200;
		$data = array();

		if(!$resp){
			$title = 'Update Pelajaran By ID';
			$code = 204;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	public function muridByNik($Nik){
		
		$body = json_validator(file_get_contents('php://input'));

		if(!$body){
			$title = 'Update murid By ID';
			$code = 400;
			$data = array();
		}

		$resp = $this->M_crud->pub_update_where('skl_master_murid', $body, array('nik' => $Nik));
		//var_dump($resp);exit;
		$title = 'Update murid By ID';
		$code = 200;
		$data = array();

		if(!$resp){
			$title = 'Update murid By ID';
			$code = 204;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
	}



	public function jenisnilaiById($Id){
		
		$body = json_validator(file_get_contents('php://input'));

		if(!$body){
			$title = 'Update Jenis Nilai By ID';
			$code = 400;
			$data = array();
		}

		$resp = $this->M_crud->pub_update_where('skl_master_jenis_nilai', $body, array('id_jenis_nilai' => $Id));
		//var_dump($resp);exit;
		$title = 'Update murid By ID';
		$code = 200;
		$data = array();

		if(!$resp){
			$title = 'Update Jenis Nilai By ID';
			$code = 204;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function userById($Id){
		
		$body = json_validator(file_get_contents('php://input'));

		if(!$body){
			$title = 'Update User By ID';
			$code = 400;
			$data = array();
		}

		$resp = $this->M_crud->pub_update_where('skl_master_user', $body, array('id' => $Id));
		//var_dump($resp);exit;
		$title = 'Update user By ID';
		$code = 200;
		$data = array();

		if(!$resp){
			$title = 'Update User By ID';
			$code = 204;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	public function opsiById($Id){
		
		$body = json_validator(file_get_contents('php://input'));

		if(!$body){
			$title = 'Update opsi By ID';
			$code = 400;
			$data = array();
		}

		$resp = $this->M_crud->pub_update_where('skl_master_opsi', $body, array('id' => $Id));
		//var_dump($resp);exit;
		$title = 'Update opsi By ID';
		$code = 200;
		$data = array();

		if(!$resp){
			$title = 'Update opsi By ID';
			$code = 204;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
	}
	

	
	


















}