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
		if(!$resp){
			$title = 'Update Guru By NIP';
			$code = 204;
			$data = array();
		}

		$title = 'Update Guru By NIP';
		$code = 200;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}


    
	public function editGuru(){

        

		$data = array(
			'nip' => $this->input->get('nip'),
			'nama_guru' => $this->input->get('nama_guru'),
			'alamat' => $this->input->get('alamat'),
			'no_telepon' => $this->input->get('no_telp'),
		);
        var_dump("PATCH", $data);
		// ($this->db->insert('skl_master_guru',$data)) ? $status = 'succces' : $status = $this->db->error();
		// $title = 'Add Guru';
		// echo skl_response($status, $title);
	}


















}