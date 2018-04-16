<?php
class Master_model extends MY_Model {
 
	function __construct()
	{
		parent::__construct();
	}


	function get_column_table($table) {
		$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$table."'";
		return $this->result($sql);
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

	function penduduk_kepala_keluarga($table) {
		$sql = "SELECT a.NIK, a.NamaLengkap,b.JenisKelamin,a.AlamatTempatLahir,a.AlamatDusun,a.AlamatRT,a.AlamatRW FROM m_penduduk a 
				INNER JOIN m_ref_jenis_kelamin b ON a.ReffJenisKelamin=b.KelaminID
				WHERE a.ReffHubunganDalamKeluarga=1 AND (a.NomorKartuKeluarga IS NULL OR a.NomorKartuKeluarga = '') AND a.NIK NOT IN (SELECT nik FROM ".$table.")";
		return $this->result($sql);
	}

	function penduduk_anggota_keluarga($table) {
		$sql = "SELECT a.NIK, a.NamaLengkap,b.JenisKelamin,a.AlamatTempatLahir,a.AlamatDusun,a.AlamatRT,a.AlamatRW FROM m_penduduk a 
				INNER JOIN m_ref_jenis_kelamin b ON a.ReffJenisKelamin=b.KelaminID
				WHERE a.ReffHubunganDalamKeluarga <> 1 AND (a.NomorKartuKeluarga IS NULL OR a.NomorKartuKeluarga = '') AND a.NIK NOT IN (SELECT nik FROM ".$table.")";
		return $this->result($sql);
	}

	function detail_penduduk_temp($nik) {
		$sql="SELECT CASE WHEN a.AlamatTempatLahir IS NULL THEN '-' ELSE a.AlamatTempatLahir END AS AlamatTempatLahir,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS AlamatKelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS AlamatRT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS AlamatRW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS AlamatKabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS AlamatKecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS AlamatKodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS AlamatProvinsi,
				a.NIK,a.NamaLengkap,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan FROM m_penduduk a
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				WHERE a.NIK = '".$nik."'";
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

	function detail_kk_temp($nokk, $table) {
		$sql = "SELECT CASE WHEN a.AlamatTempatLahir IS NULL THEN '-' ELSE a.AlamatTempatLahir END AS AlamatTempatLahir,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS AlamatKelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS AlamatRT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS AlamatRW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS AlamatKabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS AlamatKecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS AlamatKodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS AlamatProvinsi,
				t.NoKK,a.NIK,a.NamaLengkap,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan,o.HubunganDalamKeluarga,p.Kewarganegaraan,
				CASE WHEN a.NomorKitasKitap IS NULL THEN '-' ELSE a.NomorKitasKitap END AS NomorKitasKitap,
				CASE WHEN a.NomorPaspor IS NULL THEN '-' ELSE a.NomorPaspor END AS NomorPaspor,
				a.NamaAyah,a.NamaIbu,q.StatusKawin
				FROM ".$table." t 
				INNER JOIN m_penduduk a ON a.NIK=t.NIK
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_hubungan_dalam_keluarga o ON a.ReffHubunganDalamKeluarga=o.HubunganID
				INNER JOIN m_ref_kewarganegaraan p ON a.ReffWarganegara=p.KewarganegaraanID
				INNER JOIN m_ref_status_kawin q ON a.ReffStatusPerkawinan = q.StatusKawinID
				WHERE t.NoKK = '".$nokk."'";
		return $this->result($sql);
	}

	function daftar_kk_temp($table) {
		$sql = "SELECT 
				CASE WHEN a.AlamatTempatLahir IS NULL THEN '-' ELSE a.AlamatTempatLahir END AS AlamatTempatLahir,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS AlamatKelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS AlamatRT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS AlamatRW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS AlamatKabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS AlamatKecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS AlamatKodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS AlamatProvinsi,
				t.NoKK,a.NIK,a.NamaLengkap,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan,o.HubunganDalamKeluarga,p.Kewarganegaraan,
				CASE WHEN a.NomorKitasKitap IS NULL THEN '-' ELSE a.NomorKitasKitap END AS NomorKitasKitap,
				CASE WHEN a.NomorPaspor IS NULL THEN '-' ELSE a.NomorPaspor END AS NomorPaspor,
				a.NamaAyah,a.NamaIbu,
				q.StatusKawin
				FROM ".$table." t 
				INNER JOIN m_penduduk a ON a.NIK=t.NIK
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_hubungan_dalam_keluarga o ON a.ReffHubunganDalamKeluarga=o.HubunganID
				INNER JOIN m_ref_kewarganegaraan p ON a.ReffWarganegara=p.KewarganegaraanID
				INNER JOIN m_ref_status_kawin q ON a.ReffStatusPerkawinan = q.StatusKawinID
				WHERE t.Status <> 'kepala'";
		return $this->result($sql);
	}

	function daftar_kk_temp_parameter($param) {
		$parameter = '';
		if($param == 'kepala') {
			$parameter = 'kepala';
		} else {
			$parameter = 'anggota';
		}

		$sql = "SELECT 
				CASE WHEN a.AlamatTempatLahir IS NULL THEN '-' ELSE a.AlamatTempatLahir END AS AlamatTempatLahir,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS AlamatKelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS AlamatRT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS AlamatRW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS AlamatKabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS AlamatKecamatan,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS AlamatKodePos,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS AlamatProvinsi,
				t.NoKK,a.NIK,a.NamaLengkap,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan,o.HubunganDalamKeluarga,p.Kewarganegaraan,
				CASE WHEN a.NomorKitasKitap IS NULL THEN '-' ELSE a.NomorKitasKitap END AS NomorKitasKitap,
				CASE WHEN a.NomorPaspor IS NULL THEN '-' ELSE a.NomorPaspor END AS NomorPaspor,
				a.NamaAyah,a.NamaIbu,
				q.StatusKawin
				FROM m_temp_kk t 
				INNER JOIN m_penduduk a ON a.NIK=t.NIK
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_hubungan_dalam_keluarga o ON a.ReffHubunganDalamKeluarga=o.HubunganID
				INNER JOIN m_ref_kewarganegaraan p ON a.ReffWarganegara=p.KewarganegaraanID
				INNER JOIN m_ref_status_kawin q ON a.ReffStatusPerkawinan = q.StatusKawinID
				WHERE t.Status = '".$parameter."' ORDER BY t.ID";
		return $this->result($sql);
	}

	function simpan_kepala_keluarga($data) {
		$this->table = "m_kartu_kepala_keluarga";
		return $this->insert($data);
	}

	function daftar_kepala_keluarga() {
		$sql = "SELECT 
				a.NomorKartuKeluarga, a.NIK,a.NamaLengkap,d.HubunganDalamKeluarga,
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

	function update_penduduk($field, $id, $data) {
		$this->table = "m_penduduk";
		return $this->update($field, $id, $data);
	}

	function simpan_anggota_keluarga($data) {
		$this->table = "m_kartu_anggota_keluarga";
		return $this->insert($data);
	}
	/*
	function hapus_kk_temp($field, $id, $table) {
		$this->table = $table;
		return $this->delete($field, $id);
	}

	function simpan_kk_temp($data) {
		$this->table = "m_temp_kk";
		return $this->insert($data);
	}
	*/
	

	/* TEMPORARY */

	function hapus_kk_temp($field, $id, $table) {
		$this->table = $table;
		return $this->delete($field, $id);
	}

	function simpan_kk_temp($data, $table) {
		$this->table = $table;
		return $this->insert($data);
	}

	function truncate_kk_temp($table) {
		$this->table = $table;
		return $this->truncate();
	}
}
