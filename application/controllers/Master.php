<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('referensi_model');
		$this->load->model('master_model');
	}

	function cek($data) {
		if(count($data) > 0) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false));
		}
	}

	function cek_nik_penduduk($nik) {
		return $this->master_model->cek_nik_penduduk($nik);
	}

	function cek_status_keluarga($nik) {
		$cek = $this->master_model->cek_status_keluarga($nik);
		return $this->cek($cek);
	}

	function cek_nik_temp($nik) {
		return $this->master_model->cek_nik_temp($nik);
	}

	function detail_kk_temp($table) {
		$nokk = $this->input->post('NoKK');
		echo json_encode($this->master_model->detail_kk_temp($nokk, $table));
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

	function daftar_kk_temp($table) {
		echo json_encode($this->master_model->daftar_kk_temp($table));
	}

	function detail_kepala_keluarga() {
		$kk = $this->input->post('NoKK');
		$data = $this->master_model->detail_kepala_keluarga($kk);
		return $this->cek_datatable($data);
	}

	function detail_anggota_keluarga() {
		$kk = $this->input->post('NoKK');
		$data = $this->master_model->detail_anggota_keluarga($kk);
		return $this->cek_datatable($data);
	}

	

	function tambah_penduduk() {
		$viewName 	= 'penduduk/v_tambah_penduduk';
		$data = array(
			'breadcrumb' => 'Tambah Master Penduduk',
			'view'		=> $viewName,
			'title' 	=> 'Tambah Master Penduduk',
			'ReffStatusKepemilikanKTP'=> $this->referensi_model->status_kepemilikan_ktp('KepemilikanID', 'asc'),
			'ReffStatusRekamKTP'=> $this->referensi_model->status_rekam_ktp('RekamID', 'asc'),
			'ReffHubunganDalamKeluarga'	=> $this->referensi_model->hubungan_dalam_keluarga('HubunganID', 'asc'),
			'ReffJenisKelamin' => $this->referensi_model->jenis_kelamin('KelaminID', 'asc'),
			'ReffAgama' => $this->referensi_model->agama('AgamaID', 'asc'),
			'ReffStatusPenduduk' => $this->referensi_model->status_penduduk('StatusPendudukID', 'asc'),
			'ReffTempatDilahirkan' => $this->referensi_model->tempat_lahir('TempatLahirID', 'asc'),
			'ReffJenisKelahiran' => $this->referensi_model->jenis_kelahiran('JenisKelahiranID', 'asc'),
			'ReffMetodeKelahiran' => $this->referensi_model->metode_persalinan('MetodeID', 'asc'),
			'ReffPenolongKelahiran' => $this->referensi_model->penolong_kelahiran('PenolongID', 'asc'),
			'ReffPendidikanDalamKK' => $this->referensi_model->pendidikan_dalam_kk('PendidikanKKID', 'asc'),
			'ReffPendidikanSedangDitempuh' => $this->referensi_model->pendidikan_sedang_ditempuh('PendidikanTempuhID', 'asc'),
			'ReffPekerjaan' => $this->referensi_model->pekerjaan('PekerjaanID', 'asc'),
			'ReffWarganegara' => $this->referensi_model->kewarganegaraan('KewarganegaraanID', 'asc'),
			'ReffGolonganDarah' => $this->referensi_model->golongan_darah('GolonganID', 'asc'),
			'ReffCacat' => $this->referensi_model->penyandang_cacat('CacatID', 'asc'),
			'ReffAkseptorKB' => $this->referensi_model->akseptor_kb('AkseptorID', 'asc'),
			'ReffStatusKehamilan' => $this->referensi_model->status_kehamilan('KehamilanID', 'asc')
		);
		$this->template->load('template', $viewName, $data);
	}
	

	/* PENDUDUK */

	function penduduk() {
		$viewName 	= 'penduduk/v_list';
		$data = array(
			'breadcrumb' => 'Master Penduduk',
			'view'		=> $viewName,
			'title' 	=> 'Master Penduduk',
			'penduduk'	=> $this->master_model->penduduk('NIK', 'desc')
		);
		$this->template->load('template', $viewName, $data);
	}

	function delete_penduduk() {
		$id = $this->input->post('NIK');
		return $this->master_model->delete_penduduk('NIK', $id);
	}

	function detail_penduduk() {
		$nik = $this->input->post('NIK');
		echo json_encode($this->master_model->detail_penduduk($nik));
	}

	function update_penduduk() {

	}

	/*
	function savependuduk() {
		$tgl = str_replace('/', '', $this->input->post('txttanggallahir'));
		$data = array (
			'NIK'						=> $this->input->post('txtnik'),
			'NoKK'						=> $this->input->post('txtnokk'),
			'NoPaspor' 					=> $this->input->post('txtnopaspor'),
			'NoHp' 						=> $this->input->post('txtnohp'),
			'NoTelepon' 				=> $this->input->post('txtnotelp'),
			'NamaLengkap' 				=> $this->input->post('txtnama'),
			'TempatLahir' 				=> $this->input->post('txttempatlahir'),
			'Alamat' 					=> $this->input->post('txtalamat'),
			'Agama' 					=> $this->input->post('ddlagama'),
			'Kewarganegaraan' 			=> $this->input->post('ddlkewarganegaraan'),
			'TanggalLahir' 				=> substr($tgl, 4,4).'-'.substr($tgl, 2,2).'-'.substr($tgl, 0,2),
			'JenisKelamin' 				=> $this->input->post('ddlkelamin'),
			'StatusPerkawinan' 			=> $this->input->post('ddlkawin'),
			'StatusPerekamanEKTP' 		=> $this->input->post('ddlrekamektp'),
			'NomorAktaKelahiran' 		=> $this->input->post('txtaktakelahiran'),
			'NomorAktaPerkawinan' 		=> $this->input->post('txtaktaperkawinan'),
			'StatusHubunganDalamKeluarga' => $this->input->post('ddlwarga'),
			'StatusPendidikan' 			=> $this->input->post('ddlpendidikan'),
			'Pekerjaan' 				=> $this->input->post('ddlpekerjaan'),
			'GolonganDarah' 			=> $this->input->post('ddlgoldarah'),
			'NIKAyah' 					=> $this->input->post('txtnikayah'),
			'NamaAyah' 					=> $this->input->post('txtnamaayah'),
			'NIKIbu' 					=> $this->input->post('txtnikibu'),
			'NamaIbu' 					=> $this->input->post('txtnamaibu'),
			'DomisiliNegara' 			=> $this->input->post('ddlnegara'),
			'DomisiliProvinsi' 			=> $this->input->post('ddlprovinsi'),
			'DomisiliKabupatenKota' 	=> $this->input->post('ddlkabupaten'),
			'DomisiliKodePos' 			=> $this->input->post('txtkodepos'),
			'DomisiliKecamatan' 		=> $this->input->post('txtkecamatan'),
			'DomisiliDesaKelurahan' 	=> $this->input->post('txtkelurahan'),
			'DomisiliDusun' 			=> $this->input->post('txtdusun'),
			'DomisiliRW' 				=> $this->input->post('txtrw'),
			'DomisiliRT' 				=> $this->input->post('txtrt'),
			'StatusKematian' 			=> $this->input->post('ddlstatus'),
			'TanggalKematian' 			=> $this->input->post('txttanggalkematian')
		);

		$cek = $this->master_model->savependuduk($data);
		return $this->cek($cek);
	}

	function addpenduduk() {
		$viewName 	= 'penduduk/v_add';
		$data = array(
			'breadcrumb' => 'Tambah Penduduk',
			'view'		=> $viewName,
			'title' 	=> 'Tambah Penduduk',
			'kelamin'	=> $this->commons->jk(),
			'agama'		=> $this->commons->agama(),
			'kawin'		=> $this->commons->status_kawin(),
			'warga'		=> $this->commons->status_warga(),
			'pilihan'	=> $this->commons->pilihan(),
			'darah'		=> $this->commons->golongan_darah(),
			'keluarga'	=> $this->commons->status_keluarga(),
			'status'	=> $this->commons->status_hidup()
		);
		$this->template->load('template', $viewName, $data);
	}

	function addkk() {
		$viewName 	= 'kk/v_add';
		$data = array(
			'breadcrumb' => 'Tambah Kartu Keluarga',
			'view'		=> $viewName,
			'title' 	=> 'Tambah Kartu Keluarga',
			'kelamin'	=> $this->commons->jk(),
			'agama'		=> $this->commons->agama(),
			'kawin'		=> $this->commons->status_kawin(),
			'warga'		=> $this->commons->status_warga(),
			'pilihan'	=> $this->commons->pilihan(),
			'darah'		=> $this->commons->golongan_darah(),
			'keluarga'	=> $this->commons->status_keluarga(),
			'status'	=> $this->commons->status_hidup(),
			'penduduk'	=> $this->master_model->penduduk('NIK', 'desc')
		);
		$this->template->load('template', $viewName, $data);
	}

	public function index()
	{
		$viewName 	= 'v_home';
		$data = array(
			'breadcrumb' => 'Dashboard',
			'view'		=> $viewName,
			'title' 	=> 'Homepage',
		);
		$this->template->load('template', $viewName, $data);
	}
	*/

	/* AKHIR PENDUDUK */


	/* TEMPORARY */

	function detail_penduduk_temp() {
		$nik = $this->input->post('NIK');
		echo json_encode($this->master_model->detail_penduduk_temp($nik));
	}

	function daftar_kk_temp_parameter($param) {
		echo json_encode($this->master_model->daftar_kk_temp_parameter($param));
	}

	function truncate_kk_temp() {
		$cek = $this->master_model->truncate_kk_temp();
		return $this->cek($cek);
	}

	

	function hapus_kk_temp() {
		$NIK = $this->input->post('NIK');
		$table = $this->input->post('table');
		$cek = $this->master_model->hapus_kk_temp('NIK', $NIK, $table);
		return $this->cek($cek);
	}

	function simpan_kk_temp() {
		$param = $this->input->post('masuk');
		$table = $this->input->post('table');

		$parameter = '';
		if($param == 'kepala') {
			$parameter = 'kepala';
			$this->master_model->truncate_kk_temp();
		} else {
			$parameter = 'anggota';
		}

		$data = array (
			'NIK' => $this->input->post('NIK'),
			'NoKK' => $this->input->post('NoKK'),
			'Status' => $parameter,
		);
		
		$cek = $this->master_model->simpan_kk_temp($data, $table);
		return $this->cek($cek);
	}
}
