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
		);

		$resp = $this->M_crud->pub_multi_where('skl_master_user', $where);	
		// var_dump($resp->num_rows());
		// exit;	
		$title = 'Get User';
		if ($resp->num_rows() > 0) {

			$role = $resp->row()->id_role;
			//get menu

			$select = "B.*";

			$table = 'skl_akses_menu_by_role';

			$where = array(
				'A.role' => $role, 
				'A.status' => '1'
			);

			$join = array(
				"skl_menu_config B" => "ON A.id_menu = B.id"
			);

			$menu = $this->M_crud->customQuery($select, $table, $join, $where);
			$my_menu = ($menu->num_rows() > 0) ? $menu->result_array() : array();
			// print_r($menu->result_array());
			// exit;

			$data =	array(
				'id_user' => $resp->row()->id,
				'username' => $resp->row()->username,
				'password' => $resp->row()->password,
				'image' => $resp->row()->image,
				'nama' => $resp->row()->nama,
				'alamat' => $resp->row()->alamat,
				'no_telp' => $resp->row()->no_telp,
				'id_role' => $resp->row()->id_role,
				'menu' => $my_menu
			);
			
			$updateLastLogin = $this->M_crud->pub_call_sp('UpdateLastLogin', $resp->row()->username, $resp->row()->password);

		} else {

			$data = array();
			
		}
		
		$code = ($resp->num_rows() > 0) ? 200 : 404;
		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	public function addGuru(){

		$resp = $this->M_crud->pub_insert('skl_master_guru', $this->input->post());
		$title = 'Insert Guru';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	public function addMurid(){

		$resp = $this->M_crud->pub_insert('skl_master_murid', $this->input->post());
		$title = 'Insert Murid';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}



	public function addPelajaran(){

		$resp = $this->M_crud->pub_insert('skl_master_pelajaran', $this->input->post());
		$title = 'Insert Pelajaran';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addJenisNilai(){

		$resp = $this->M_crud->pub_insert('skl_master_jenis_nilai', $this->input->post());
		$title = 'Insert Jenis Nilai';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	public function adduser(){

		$replacements = array("password" => MD5($this->input->post('password')));
		$merge = array_merge($this->input->post(), $replacements);

		$resp = $this->M_crud->pub_insert('skl_master_user', $merge);
		$title = 'Insert user';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addopsi(){

		$resp = $this->M_crud->pub_insert('skl_master_opsi', $this->input->post());
		$title = 'Insert Opsi';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	public function addrole(){

		$resp = $this->M_crud->pub_insert('skl_master_role', $this->input->post());
		$title = 'Insert Role';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addnilai(){

		$resp = $this->M_crud->pub_insert('skl_trx_nilai', $this->input->post());
		$title = 'Insert Nilai';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addabsen(){
		
		//print_r($this->input->post());
		$this->load->model('M_crud');

		//param untuk insert
		$now = date("Y-m-d H:i:s");

		$date = array(
			'date' => $now
		);

		$body = array_merge($date, $this->input->post());
		//param untuk insert

		//param check jika data exist by id murid dan date
		$where_date = array(
			'DATE(date)' => date("Y-m-d", strtotime($now))
		);

		unset($_POST['keterangan']);
		unset($_POST['status']);
		//param check jika data exist by id murid, id pelajaran dan date

		$where_exist = array_merge($where_date, $this->input->post()); //semua posted data kecuali yg di unset
		$if_exist = $this->M_crud->pub_multi_where('skl_trx_absen',$where_exist);

		$title = 'Insert Absen';

		if($if_exist->num_rows() > 0){

			$code = 409;
			$data = array();

		}else{

			$resp = $this->M_crud->pub_insert('skl_trx_absen', $body);

			$code = ($resp) ? 201 : 409;
			$data = array();
		}

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}



	public function addtingkat(){

		$resp = $this->M_crud->pub_insert('skl_master_tingkat', $this->input->post());
		$title = 'Insert Tingkat';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	public function addkelas(){

		$resp = $this->M_crud->pub_insert('skl_master_kelas', $this->input->post());
		$title = 'Insert Tingkat';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addmenu(){

		$resp = $this->M_crud->pub_insert('skl_menu_config', $this->input->post());
		$title = 'Insert Menu';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addakses(){

		$resp = $this->M_crud->pub_insert('skl_akses_menu_by_role', $this->input->post());
		$title = 'Insert Akses';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}

	public function addMapingMuridByUser(){

		$resp = $this->M_crud->pub_insert('skl_mapping_murid_by_user', $this->input->post());
		$title = 'Insert Mapping Murid By User';
		$code = ($resp) ? 201 : 409;
		$data = array();

		echo skl_response($code, $title, $data, getCodeText($code));
	}


	


}
