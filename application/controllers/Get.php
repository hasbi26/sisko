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

	public function nilai(){
		
		$nik = $this->input->get('id_murid');
		$id_jenis_nilai = $this->input->get('id_jenis_nilai');
		
		$sql = "select c.nik, c.nama, b.nama_pelajaran, a.nilai, d.jenis_nilai from skl_trx_nilai a ".
				"join skl_master_pelajaran b on a.id_pelajaran = b.id_pelajaran join skl_master_murid c on c.nik = a.id_murid ".
				"join skl_master_jenis_nilai d on d.id_jenis_nilai = a.id_jenis_nilai where nik = ? and d.id_jenis_nilai = ?";
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

		$title = 'Get nilai By Nik';
		$code = ($resp->num_rows() > 0) ? 200 : 404;

		echo skl_response($code, $title, $data, getCodeText($code));
		
	}


}