<?php
class Kk_model extends MY_Model {
 
	function __construct()
	{
		parent::__construct();
	}

	function detail_tmp($nokk, $table, $status) {
		$sql = "SELECT * FROM ".$table." WHERE NomorKK='".$nokk."' AND Status = '".$status."'";
		return $this->result($sql);
	}

	function detail_penduduk_by_nik($nik) {
		$sql = "SELECT 
				a.NIK,a.NamaLengkap,a.NomorKartuKeluarga AS NomorKK,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				CASE WHEN a.Alamat IS NULL THEN '-' ELSE a.Alamat END AS Alamat,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS Kelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS RT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS RW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS Kabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS Kecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS KodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS Provinsi,
				e.JenisKelamin,f.Agama,l.PendidikanKK AS Pendidikan,n.Pekerjaan,a.NamaAyah,a.NamaIbu,a.NomorPaspor AS NoPaspor, a.NomorKitasKitap AS NoKitasKitap,o.Kewarganegaraan,d.HubunganDalamKeluarga
				FROM m_penduduk a
				INNER JOIN m_ref_hubungan_dalam_keluarga d ON a.ReffHubunganDalamKeluarga = d.HubunganID
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_kewarganegaraan o ON a.ReffWarganegara = o.KewarganegaraanID
				WHERE a.NIK = '".$nik."'";
		return $this->result($sql);
	}











	function daftar_kepala_keluarga() {
		$sql = "SELECT 
				a.NomorKartuKeluarga, a.NIK,a.NamaLengkap,d.HubunganDalamKeluarga,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS AlamatKelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS AlamatRT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS AlamatRW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS AlamatKabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS AlamatKecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS AlamatKodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS AlamatProvinsi
				FROM m_penduduk a
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_hubungan_dalam_keluarga d ON a.ReffHubunganDalamKeluarga = d.HubunganID
				WHERE d.HubunganDalamKeluarga LIKE '%kepala%' AND (a.NomorKartuKeluarga <> NULL OR a.NomorKartuKeluarga <> '')";
		return $this->result($sql);
	}

	function daftar_anggota_keluarga() {
		$sql = "SELECT 
				a.NomorKartuKeluarga,a.NIK,a.NamaLengkap,d.HubunganDalamKeluarga,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan,
				CASE WHEN a.AlamatTempatLahir IS NULL THEN '-' ELSE a.AlamatTempatLahir END AS AlamatTempatLahir,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS AlamatKelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS AlamatRT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS AlamatRW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS AlamatKabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS AlamatKecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS AlamatKodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS AlamatProvinsi
				FROM m_penduduk a
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_hubungan_dalam_keluarga d ON a.ReffHubunganDalamKeluarga = d.HubunganID
				WHERE d.HubunganDalamKeluarga LIKE '%anggota%'";
		return $this->result($sql);
	}

	function detail_kepala_keluarga($nokk) {
		$sql = "SELECT * FROM m_kartu_kepala_keluarga WHERE NomorKK = '".$nokk."'";
		return $this->result($sql);
	}

	function detail_anggota_keluarga($nokk) {
		$sql = "SELECT * FROM m_kartu_anggota_keluarga WHERE NomorKK = '".$nokk."'";
		return $this->result($sql);
	}

	function hapus_kartu_anggota_keluarga($field, $id) {
		$this->table = "m_kartu_anggota_keluarga";
		return $this->delete($field, $id);
	}

	function simpan_kepala_keluarga($data) {
		$this->table = "m_kartu_kepala_keluarga";
		return $this->insert($data);
	}

	function simpan_anggota_keluarga($data) {
		$this->table = "m_kartu_anggota_keluarga";
		return $this->insert($data);
	}

	/* TEMPORARY */

	


	function hapus_tmp($field, $id, $table) {
		$this->table = $table;
		return $this->delete($field, $id);
	}

	function simpan_tmp($data, $table) {
		$this->table = $table;
		return $this->insert($data);
	}

	function truncate_kk_temp($table) {
		$this->table = $table;
		return $this->truncate();
	}
	
	function get_temporary_kk($table, $status, $nokk) {
		$sql ="SELECT * FROM ".$table." WHERE NomorKK = '".$nokk."' AND Status = '".$status."'";
		return $this->result($sql);
	}

	function get_temporary_nik($table, $status, $nik) {
		$sql ="SELECT * FROM ".$table." WHERE NIK = '".$nik."' AND Status = '".$status."'";
		return $this->result($sql);
	}

	function truncate_temporary($table) {
		$this->table = $table;
		return $this->truncate();
	}

	function simpan_temporary($table, $data) {
		$this->table = $table;
		return $this->insert($data);
	}



































	function cek_status_keluarga($nik) {
		$sql = "SELECT b.HubunganDalamKeluarga FROM M_penduduk a
				INNER JOIN M_ref_hubungan_dalam_keluarga b ON a.ReffHubunganDalamKeluarga=b.HubunganID
				WHERE b.HubunganDalamKeluarga LIKE '%KEPALA%' AND a.NIK = '".$nik."'";
		return $this->result($sql);
	}

	function cek_nik_penduduk($nik) {
		$sql = "SELECT NIK FROM m_penduduk WHERE NIK = ".$nik."";
		return $this->result($sql);
	}

	function cek_nik_temp($nik) {
		$sql = "SELECT NIK FROM m_temp_kk WHERE NIK = ".$nik."";
		return $this->result($sql);
	}

	function load_table_kk($table, $param, $nokk) {
		$sql = "SELECT * FROM ".$table." WHERE NomorKK = '".$nokk."' AND Status = '".$param."' ORDER BY CreatedDate";
		return $this->result($sql);
	}

	function load_modal_kartu_keluarga($table, $param) {
		$operator = '';
		if($param == "kepala") {
			$operator = "=";
		}else {
			$operator = "<>";
		}

		$sql = "SELECT a.NIK, a.NamaLengkap,b.JenisKelamin,a.TempatLahir,a.Alamat, a.AlamatDusun AS Dusun,a.AlamatRT AS RT,a.AlamatRW as RW,f.Agama,l.PendidikanKK AS Pendidikan,n.Pekerjaan 
				FROM m_penduduk a 
				INNER JOIN m_ref_jenis_kelamin b ON a.ReffJenisKelamin=b.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				WHERE a.ReffHubunganDalamKeluarga ".$operator." 1 AND (a.NomorKartuKeluarga IS NULL OR a.NomorKartuKeluarga = '') AND a.NIK NOT IN (SELECT nik FROM ".$table.")";
		return $this->result($sql);
	}

	function detail_penduduk($nik) {
		$sql = "SELECT a.* FROM m_penduduk a
				INNER JOIN m_ref_status_kepemilikan_ktp b ON a.ReffStatusKepemilikanKTP = b.KepemilikanID
				INNER JOIN m_ref_status_rekam_ktp c ON a.ReffStatusRekamKTP = c.RekamID
				INNER JOIN m_ref_hubungan_dalam_keluarga d ON a.ReffHubunganDalamKeluarga = d.HubunganID
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_status_penduduk g ON a.ReffStatusPenduduk = g.StatusPendudukID
				INNER JOIN m_ref_tempat_lahir h ON a.ReffTempatDilahirkan = h.TempatLahirID
				INNER JOIN m_ref_jenis_kelahiran i ON a.ReffJenisKelahiran = i.JenisKelahiranID
				INNER JOIN m_ref_metode_persalinan j ON a.ReffMetodeKelahiran = j.MetodeID
				INNER JOIN m_ref_penolong_kelahiran k ON a.ReffPenolongKelahiran = k.PenolongID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pendidikan_sedang_ditempuh m ON a.ReffPendidikanSedangDitempuh = m.PendidikanTempuhID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_kewarganegaraan o ON a.ReffWarganegara = o.KewarganegaraanID
				INNER JOIN m_ref_golongan_darah p ON a.ReffGolonganDarah = p.GolonganID
				INNER JOIN m_ref_penyandang_cacat q ON a.ReffCacat = q.CacatID
				INNER JOIN m_ref_akseptor_kb r ON a.ReffAkseptorKB = r.AkseptorID
				INNER JOIN m_ref_status_kehamilan s ON a.ReffStatusKehamilan = s.KehamilanID
				WHERE a.NIK = '".$nik."'";
		return $this->result($sql);
	}
}
