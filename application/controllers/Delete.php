<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DELETE extends SEKOLAH_Controller {

	function __construct(){
		parent::__construct();

		if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
			echo skl_response(405, $title="Error", array(), getCodeText(405));
			exit;
		}
	}



    public function guruByNip($nip){
		
		$body = json_validator(file_get_contents('php://input'));

		// if(!$body){
		// 	$title = 'delete Guru By NIP';
		// 	$code = 400;
		// 	$data = array();
		// }

		$resp = $this->M_crud->pub_delete_where('skl_master_guru', array('nip' => $nip));
        $title = 'Delete Guru By NIP';
        $code = 200;
        $data = array();

        if(!$resp){
			$title = 'Delete Guru By NIP';
			$code = 204;
			$data = array();
		}


		echo skl_response($code, $title, $data, getCodeText($code));

	}


}