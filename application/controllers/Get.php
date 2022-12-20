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

		$data = array();
		if($resp->num_rows() > 0){

			foreach ($resp->result() as $key => $value) {
				# code...
				//print_r($value);
				$data[] = array(
					'nik' => $value->nik,
					'id_user' => $value->id_user,
					'id_sekolah' => $value->id_sekolah,
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

	public function nilai_by_nik(){ //untuk datatable
		
		$nik = $this->input->get('nik');
		$start = $this->input->get('start'); // tampilkan mulai dari record ke ..
		$limit = $this->input->get('limit'); //tampilkan sebanyak
		$orderby = $this->input->get('order_by'); //nama field
		$ordertype = $this->input->get('order_type'); // ASC / DESC

		$select = "c.nik, c.nama, b.nama_pelajaran, a.nilai, d.jenis_nilai";

		$join = array(
			"skl_master_pelajaran b" => "on a.id_pelajaran = b.id_pelajaran",
			"skl_master_murid c" => "on c.nik = a.id_murid",
			"skl_master_jenis_nilai d" => "on d.id_jenis_nilai = a.id_jenis_nilai"
		);

		$where = array(
			"nik" => $nik
		);
		
		// $query = "select c.nik, c.nama, b.nama_pelajaran, a.nilai, d.jenis_nilai from skl_trx_nilai a ".
		// 		"join skl_master_pelajaran b on a.id_pelajaran = b.id_pelajaran join skl_master_murid c on c.nik = a.id_murid ".
		// 		"join skl_master_jenis_nilai d on d.id_jenis_nilai = a.id_jenis_nilai where nik = '{$nik}' ";
		
		// if($orderby !== "" && $ordertype !== ""){
		// 	$query .= "ORDER BY {$orderby} {$ordertype} ";
		// }

		// //$resp_all = $this->M_crud->customQuery2($query);
		
		// $query .= "LIMIT {$limit} OFFSET {$start}";
		//echo $query;exit;
		$resp = $this->M_crud->customQuery($select, $join, $where, $orderby, $ordertype, $limit, $start);
		// exit;
		$resp_all = $this->M_crud->customQuery($select, $join, $where, $orderby, $ordertype);
		// var_dump($resp);
		// exit;

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
		//print_r($this->input->get());
		//$nip = $this->input->get('nip');
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

		
	




}
