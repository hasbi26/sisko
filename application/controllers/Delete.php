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

    public function pelajaranById($Id){

		$resp = $this->M_crud->pub_delete_where('skl_master_pelajaran', array('id_pelajaran' => $Id));
		
        $title = 'Delete Pelajaran By Id';
        $code = 200;
        $data = array();

        if(!$resp){
			$title = 'Delete Pelajaran By Id';
			$code = 204;
			$data = array();
		}


		echo skl_response($code, $title, $data, getCodeText($code));

	}

	public function muridByNik($Nik){

		$resp = $this->M_crud->pub_delete_where('skl_master_murid', array('nik' => $Nik));
		
        $title = 'Delete murid By Nik';
        $code = 200;
        $data = array();

        if(!$resp){
			$title = 'Delete murid By Nik';
			$code = 204;
			$data = array();
		}


		echo skl_response($code, $title, $data, getCodeText($code));

	}

	public function jenisnilaiById($Id){

		$resp = $this->M_crud->pub_delete_where('skl_master_jenis_nilai', array('id_jenis_nilai' => $Id));
		
        $title = 'Delete jenis nilai by id';
        $code = 200;
        $data = array();

        if(!$resp){
			$title = 'Delete jenis nilai by id';
			$code = 204;
			$data = array();
		}


		echo skl_response($code, $title, $data, getCodeText($code));

	}

	public function userById($Id){

		$resp = $this->M_crud->pub_delete_where('skl_master_user', array('id' => $Id));
		
        $title = 'Delete user by id';
        $code = 200;
        $data = array();

        if(!$resp){
			$title = 'Delete user by id';
			$code = 204;
			$data = array();
		}


		echo skl_response($code, $title, $data, getCodeText($code));

	}

	public function opsiById($Id){

		$resp = $this->M_crud->pub_delete_where('skl_master_opsi', array('id' => $Id));
		
        $title = 'Delete opsi by id';
        $code = 200;
        $data = array();

        if(!$resp){
			$title = 'Delete opsi by id';
			$code = 204;
			$data = array();
		}


		echo skl_response($code, $title, $data, getCodeText($code));

	}


		

}