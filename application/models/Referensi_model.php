<?php
class Referensi_Model extends MY_Model {
 
	function __construct()
	{
		parent::__construct();
	}
	
	function agama($sort, $order) {
		$this->table = 'm_ref_agama';
		return $this->find_all($sort, $order);
	}

	function akseptor_kb($sort, $order) {
		$this->table = 'm_ref_akseptor_kb';
		return $this->find_all($sort, $order);
	}

	function golongan_darah($sort, $order) {
		$this->table = 'm_ref_golongan_darah';
		return $this->find_all($sort, $order);
	}

	function hubungan_dalam_keluarga($sort, $order) {
		$this->table = 'm_ref_hubungan_dalam_keluarga';
		return $this->find_all($sort, $order);
	}

	function jabatan($sort, $order) {
		$this->table = 'm_ref_jabatan';
		return $this->find_all($sort, $order);
	}

	function jenis_gelar($sort, $order) {
		$this->table = 'm_ref_jenis_gelar';
		return $this->find_all($sort, $order);
	}

	function jenis_kelahiran($sort, $order) {
		$this->table = 'm_ref_jenis_kelahiran';
		return $this->find_all($sort, $order);
	}

	function jenis_kelamin($sort, $order) {
		$this->table = 'm_ref_jenis_kelamin';
		return $this->find_all($sort, $order);
	}

	function kabupaten($sort, $order) {
		$this->table = 'm_ref_kabupaten';
		return $this->find_all($sort, $order);
	}

	function kecamatan($sort, $order) {
		$this->table = 'm_ref_kecamatan';
		return $this->find_all($sort, $order);
	}

	function status_kehamilan($sort, $order) {
		$this->table = 'm_ref_status_kehamilan';
		return $this->find_all($sort, $order);
	}

	function kelurahan($sort, $order) {
		$this->table = 'm_ref_kelurahan';
		return $this->find_all($sort, $order);
	}

	function kewarganegaraan($sort, $order) {
		$this->table = 'm_ref_kewarganegaraan';
		return $this->find_all($sort, $order);
	}

	function level_user($sort, $order) {
		$this->table = 'm_ref_level_user';
		return $this->find_all($sort, $order);
	}

	function metode_persalinan($sort, $order) {
		$this->table = 'm_ref_metode_persalinan';
		return $this->find_all($sort, $order);
	}

	function pekerjaan($sort, $order) {
		$this->table = 'm_ref_pekerjaan';
		return $this->find_all($sort, $order);
	}

	function pendidikan_dalam_kk($sort, $order) {
		$this->table = 'm_ref_pendidikan_dalam_kk';
		return $this->find_all($sort, $order);
	}

	function pendidikan_sedang_ditempuh($sort, $order) {
		$this->table = 'm_ref_pendidikan_sedang_ditempuh';
		return $this->find_all($sort, $order);
	}

	function penolong_kelahiran($sort, $order) {
		$this->table = 'm_ref_penolong_kelahiran';
		return $this->find_all($sort, $order);
	}

	function penyandang_cacat($sort, $order) {
		$this->table = 'm_ref_penyandang_cacat';
		return $this->find_all($sort, $order);
	}

	function provinsi($sort, $order) {
		$this->table = 'm_ref_provinsi';
		return $this->find_all($sort, $order);
	}

	function status_kawin($sort, $order) {
		$this->table = 'm_ref_status_kawin';
		return $this->find_all($sort, $order);
	}

	function status_kepemilikan_ktp($sort, $order) {
		$this->table = 'm_ref_status_kepemilikan_ktp';
		return $this->find_all($sort, $order);
	}

	function status_penduduk($sort, $order) {
		$this->table = 'm_ref_status_penduduk';
		return $this->find_all($sort, $order);
	}

	function status_rekam_ktp($sort, $order) {
		$this->table = 'm_ref_status_rekam_ktp';
		return $this->find_all($sort, $order);
	}

	function tempat_lahir($sort, $order) {
		$this->table = 'm_ref_tempat_lahir';
		return $this->find_all($sort, $order);
	}

	function umur($sort, $order) {
		$this->table = 'm_ref_umur';
		return $this->find_all($sort, $order);
	}
}
