<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KK extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('referensi_model');
		$this->load->model('kk_model');
		$this->load->model('master_model');
		$this->load->model('temporary_model');
	}

	function cek($data) {
		if(count($data) > 0) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}

	function cek_datatable($data) {
		if(count($data) > 0 ) {
			echo json_encode(array('data' => $data ));
		} else {
			echo json_encode([
			    "sEcho" => 1,
			    "iTotalRecords" => 0,
			    "iTotalDisplayRecords" => 0,
			    "data" => []
			]);
		}
	}

	function get_temporary_kk($table, $status, $nokk) {
		echo json_encode($this->kk_model->get_temporary_kk($table, $status, $nokk));
	}

	function daftar_kk_temp($table) {
		echo json_encode($this->kk_model->daftar_kk_temp($table));
	}

	function detail_penduduk_tmp() {
		$nik = $this->input->post('NIK');
		echo json_encode($this->kk_model->detail_penduduk_tmp($nik));
	}

	function truncate_kk_temp() {
		$cek = $this->kk_model->truncate_kk_temp();
		return $this->cek($cek);
	}

	function detail_penduduk_by_nik($nik) {
		echo json_encode($this->kk_model->detail_penduduk_by_nik($nik));
	}


	function simpan_kartu_keluarga() {
		$nokk = $this->input->post('NoKK');

		$this->temporary_model->select_tmpc_insert_kartu_keluarga($nokk, 'kepala');
		$a = $this->kk_model->detail_tmp($nokk, 'tmp_c', 'kepala');
		$this->temporary_model->select_tmpc_insert_kartu_keluarga($nokk, 'anggota');
		$b = $this->kk_model->detail_tmp($nokk, 'tmp_c', 'anggota');

		foreach ($a as $val) {
			$id = $val['NIK'];
			$data = array (
				'NomorKartuKeluarga' => $val['NomorKK'],
				'Flag' => 'C',
				'KeteranganKK' => 'Pembuatan KK Baru'
			);
			$this->master_model->update_penduduk('NIK', $id, $data);
		}
		
		foreach ($b as $val) {
			$id = $val['NIK'];
			$data = array (
				'NomorKartuKeluarga' => $val['NomorKK'],
				'Flag' => 'C',
				'KeteranganKK' => 'Pembuatan KK Baru'
			);
			$this->master_model->update_penduduk('NIK', $id, $data);
		}
		
		return json_encode(array('success' => true));
	}



	function simpan_tmp() {
		$nik = $this->input->post('NIK');
		$nokk = $this->input->post('NoKK');
		$table = $this->input->post('table');
		$status = $this->input->post('status');
		if($status == 'kepala') {
			$this->temporary_model->truncate_tmp_c();
		}
		
		$cek = $this->temporary_model->select_penduduk_insert_tmp($nokk, $nik, $table, $status);
		return $this->cek($cek);
	}

	function hapus_tmp() {
		$nik = $this->input->post('NIK');
		$table = $this->input->post('table');
		$ket = $this->input->post('ket');
		
		$data = array (
			'NomorKartuKeluarga' => null,
			'Flag' => 'D',
			'KeteranganKK' => $ket
		);
		$this->master_model->update_penduduk('NIK',$nik, $data);
		//$this->kk_model->hapus_kartu_anggota_keluarga('NIK',$NIK);
		$cek = $this->kk_model->hapus_tmp('NIK', $nik, $table);
		return $this->cek($cek);
	}

	function hapus_temporary($table) {
		$nik = $this->input->post('NIK');
		$cek = $this->kk_model->hapus_tmp('NIK', $nik, $table);
		return $this->cek($cek);
	}

	function simpan_kk_temp($tabel) {
		$param = $this->input->post('masuk');

		$parameter = '';
		if($param == 'kepala') {
			$parameter = 'kepala';
			$this->kk_model->truncate_kk_temp();
		} else {
			$parameter = 'anggota';
		}

		$data = array (
			'NIK' => $this->input->post('NIK'),
			'NoKK' => $this->input->post('NoKK'),
			'Status' => $parameter,
			'Flag' => 'C'
		);
		
		$cek = $this->kk_model->simpan_kk_temp($data, $tabel);
		return $this->cek($cek);
	}

	function detail_kepala_keluarga() {
		$kk = $this->input->post('NoKK');
		$data = $this->kk_model->detail_kepala_keluarga($kk);
		return $this->cek_datatable($data);
	}

	function detail_anggota_keluarga() {
		$kk = $this->input->post('NoKK');
		$data = $this->kk_model->detail_anggota_keluarga($kk);
		return $this->cek_datatable($data);
	}

	function loadTable($table, $param) {
		$data = $this->kk_model->load_modal_kartu_keluarga($table, $param);
		return $this->cek_datatable($data);
	}

	function loadTableKK($table, $param) {
		$kk = $this->input->post('NomorKK');
		$data = $this->kk_model->load_table_kk($table, $param, $kk);
		return $this->cek_datatable($data);
	}

	function daftar_kk() {
		$viewName 	= 'kk/v_daftar_kk';
		$data = array(
			'breadcrumb' => 'Master Kartu Keluarga',
			'view'		=> $viewName,
			'title' 	=> 'Master Kartu Keluarga',
			'daftar_kk'	=> $this->kk_model->daftar_kepala_keluarga()
		);

		$this->template->load('template', $viewName, $data);
	}

	function tambah_kk() {
		$viewName 	= 'kk/v_tambah_kk';
		$data = array(
			'breadcrumb' => 'Tambah Master KK',
			'view'		=> $viewName,
			'title' 	=> 'Tambah Master KK'
		);
		$this->temporary_model->truncate_tmp_c();
		$this->template->load('template', $viewName, $data);
	}

	function edit_kk($nokk) {
		$data_kepala = $this->kk_model->detail_kepala_keluarga($nokk);
		$data_anggota = $this->kk_model->detail_anggota_keluarga($nokk);

		$viewName 	= 'kk/v_edit_kk';
		$data = array(
			'breadcrumb' => 'Edit Master KK',
			'view'		=> $viewName,
			'title' 	=> 'Edit Master KK',
			'detail_kk' => $this->kk_model->detail_tmp($nokk,'tmp_u','kepala')
		);

		if((count($data_anggota)) > 0 && (count($data_kepala) > 0)) {
			$this->temporary_model->truncate_tmp_u();
			foreach ($data_kepala as $val) {
				$this->temporary_model->select_kk_insert_tmp_u($val['NIK'],'kepala');
			}

			foreach ($data_anggota as $val) {
				$this->temporary_model->select_kk_insert_tmp_u($val['NIK'],'anggota');
			}
		}

		$this->template->load('template', $viewName, $data);
	}

	function hapup_tmp() {
		$NIK = $this->input->post('NIK');
		$table = $this->input->post('table');
		
		$data = array (
			'NomorKartuKeluarga' => null,
			'Flag' => 'D'
		);

		$this->master_model->update_penduduk('NIK',$NIK, $data);
		$this->master_model->hapus_kartu_anggota_keluarga('NIK',$NIK);
		$cek = $this->master_model->hapus_kk_temp('NIK', $NIK, $table);
		return $this->cek($cek);
	}
}