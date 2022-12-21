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
			'c.id' => $this->input->get('id')
		);

		$select = "a.nama, a.nis,a.alamat,a.image,a.telepon,c.id as id_user";

		$join = array(
			"skl_mapping_murid_by_user b" => "ON a.id = b.id_murid",
			"skl_master_user c" => "ON b.id_user = c.id",
		);

		$table = 'skl_master_murid';

		$resp = $this->M_crud->customQuery($select, $table, $join, $where);

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[] = array(
					'nis' => $value->nis,
					'id' => $value->id_user,
					'nama' => $value->nama,
					'alamat' => $value->alamat,
					'telepon' => $value->alamat,
					'image' => $value->image,
				);

			}

		}

		$title = 'Get Murid By User';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	public function nilai_by_nis(){ //suntuk datatable
		
		$nis = $this->input->get('nis');
		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC
	
		$select = "a.* , b.nilai,c.nama_pelajaran, d.jenis_nilai";

		$join = array(
			"skl_trx_nilai b" => "ON a.id = b.id_murid",
			 "skl_master_pelajaran c" =>" ON b.id_pelajaran = c.id",
			"skl_master_jenis_nilai d" => "ON b.id_jenis_nilai = d.id "
		);

		$where = array(
			"a.id" => $nis
		);
		
		$table = 'skl_master_murid';


		$resp = $this->M_crud->customQuery($select, $table, $join, $where, $orderby, $ordertype, $limit, $start);
		//  exit;
		$resp_all = $this->M_crud->customQuery($select, $table, $join, $where, $orderby, $ordertype);
		// var_dump($resp);
		// exit;

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[] = array(
					'nis' => $value->id,
					'nama' => $value->nama,
					'nama_pelajaran' => $value->nama_pelajaran,
					'nilai' => $value->nilai,
					'jenis_nilai' => $value->jenis_nilai,
				);

			}

		}

		$title = 'Get nilai By Nik';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());
		
	}

	public function opsi(){

		$resp = $this->M_crud->all('skl_master_opsi');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All Opsi';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));

	}

	public function absen(){
		
		$nik = $this->input->get('id_murid');
		$id_jenis_nilai = $this->input->get('id_jenis_nilai');
		
		$sql = "select nama, checktime, status, keterangan from skl_trx_absen a join skl_master_murid b on a.id_murid = b.nik 
		where nik = '123' ";
		$this->db->query($sql, array($nik, $id_jenis_nilai));

		$resp = $this->db->query($sql, array($nik, $id_jenis_nilai));

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[] = array(
					'nik' => $value->nik,
					'nama' => $value->nama,
					'nama_pelajaran' => $value->nama_pelajaran,
					'nilai' => $value->nilai,
					'jenis_nilai' => $value->jenis_nilai,
				);

			}

		}
	}

	public function guruAll(){ //untuk datatable

		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$resp = $this->M_crud->all('skl_master_guru', $start, $limit, $orderby, $ordertype);
		//exit;
		$resp_all = $this->M_crud->all('skl_master_guru');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All Guru';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());

	}

	public function guruByNip(){
		$resp = $this->M_crud->pub_multi_where('skl_master_guru', $this->input->get());

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[$key] = $value;

			}

		}

		$title = 'Get Guru By NIP';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	public function pelajaranById(){
		$resp = $this->M_crud->pub_multi_where('skl_master_pelajaran', $this->input->get());

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[$key] = $value;

			}

		}

		$title = 'Get Pelejaran By Id';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	public function pelajaranAll(){ //untuk datatable

		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$resp = $this->M_crud->all('skl_master_pelajaran', $start, $limit, $orderby, $ordertype);
		//exit;
		$resp_all = $this->M_crud->all('skl_master_pelajaran');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All pelajaran';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());

	}

	public function muridByNik(){
		$resp = $this->M_crud->pub_multi_where('skl_master_murid', $this->input->get());

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[$key] = $value;

			}

		}

		$title = 'Get Murid By Id';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	public function muridAll(){ //untuk datatable

		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$resp = $this->M_crud->all('skl_master_murid', $start, $limit, $orderby, $ordertype);
		//exit;
		$resp_all = $this->M_crud->all('skl_master_murid');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All murid';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());

	}


	public function jenisnilaiById(){
		$resp = $this->M_crud->pub_multi_where('skl_master_jenis_nilai', $this->input->get());

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[$key] = $value;

			}

		}

		$title = 'Get jenis nilai By Id';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	

	public function jenisnilaiAll(){ //untuk datatable

		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$resp = $this->M_crud->all('skl_master_jenis_nilai', $start, $limit, $orderby, $ordertype);
		//exit;
		$resp_all = $this->M_crud->all('skl_master_jenis_nilai');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All murid';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());

	}


	public function userAll(){ //untuk datatable

		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$resp = $this->M_crud->all('skl_master_user', $start, $limit, $orderby, $ordertype);
		//exit;
		$resp_all = $this->M_crud->all('skl_master_user');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All User';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());

	}
	

	public function userById(){
		$resp = $this->M_crud->pub_multi_where('skl_master_user', $this->input->get());

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[$key] = $value;

			}

		}

		$title = 'Get user By Id';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}

	public function opsiById(){
		$resp = $this->M_crud->pub_multi_where('skl_master_opsi', $this->input->get());

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[$key] = $value;

			}

		}

		$title = 'Get opsi By Id';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}


	public function opsiAll(){ //untuk datatable

		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$resp = $this->M_crud->all('skl_master_opsi', $start, $limit, $orderby, $ordertype);
		//exit;
		$resp_all = $this->M_crud->all('skl_master_opsi');

		$data = array();

		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				$data[$key] = $value;
			}

		}

		$title = 'Get All Opsi';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code), $resp_all->num_rows());

	}
	
	
	


}
