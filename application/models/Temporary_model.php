<?php
class Temporary_model extends MY_Model {
 
	function __construct()
	{
		parent::__construct();
	}

	function truncate_tmp_c() {
		$this->table = "tmp_c";
		return $this->truncate();
	}

	function truncate_tmp_u() {
		$this->table = "tmp_u";
		return $this->truncate();
	}

	function simpan_tmp_c($data) {
		$this->table = "tmp_c";
		return $this->insert($data);
	}

	function simpan_tmp_u($data) {
		$this->table = "tmp_u";
		return $this->insert($data);
	}

	function hapus_tmp_u($field, $id) {
		$this->table = "tmp_u";
		return $this->delete($field, $id);
	}

	function hapus_tmp_c($field, $id) {
		$this->table = "tmp_c";
		return $this->delete($field, $id);
	}

	function select_tmpc_insert_kartu_keluarga($nokk, $status) {
		$table = '';
		if ($status == 'kepala') {
			$table = 'm_kartu_kepala_keluarga';
		} else {
			$table = 'm_kartu_anggota_keluarga';
		}
		$sql ="INSERT INTO ".$table." (NIK,NomorKK,NamaLengkap,JenisKelamin,TempatLahir,TanggalLahir,Agama,Pendidikan,Pekerjaan,StatusPerkawinan,Kewarganegaraan,StatusHubunganDalamKeluarga,NomorKitapKitas,NomorPaspor,NamaAyah,NamaIbu,Alamat,RT,RW,Kelurahan,Kecamatan,Kabupaten,Provinsi,KodePos)
				SELECT NIK,NomorKK,NamaLengkap,JenisKelamin,TempatLahir,TanggalLahir,Agama,Pendidikan,Pekerjaan,StatusPerkawinan,Kewarganegaraan,StatusHubunganDalamKeluarga,NomorKitapKitas,NomorPaspor,NamaAyah,NamaIbu,Alamat,RT,RW,Kelurahan,Kecamatan,Kabupaten,Provinsi,KodePos
				FROM tmp_c 
				WHERE STATUS='".$status."'";
		return $this->query($sql);
	}

	function select_penduduk_insert_tmp($nokk, $nik, $tableDesc, $status) {
		$sql ="INSERT INTO ".$tableDesc." (NIK,NomorKK,NamaLengkap,JenisKelamin,TempatLahir,TanggalLahir,Agama,Pendidikan,Pekerjaan,StatusPerkawinan,Kewarganegaraan,StatusHubunganDalamKeluarga,NomorKitapKitas,NomorPaspor,NamaAyah,NamaIbu,Alamat,RT,RW,Kelurahan,Kecamatan,Kabupaten,Provinsi,KodePos,Status, CreatedDate)
				SELECT
				'".$nik."' AS NIK,'".$nokk."' AS NomorKK, a.NamaLengkap,e.JenisKelamin,
				CASE WHEN a.TempatLahir IS NULL THEN '-' ELSE a.TempatLahir END AS TempatLahir,
				CASE WHEN a.TanggalLahir IS NULL THEN '-' ELSE a.TanggalLahir END AS TanggalLahir,
				f.Agama,l.PendidikanKK AS Pendidikan,n.Pekerjaan,q.StatusKawin as StatusPerkawinan,
				o.Kewarganegaraan,d.HubunganDalamKeluarga,a.NomorKitasKitap AS NoKitasKitap,a.NomorPaspor AS NoPaspor,a.NamaAyah,a.NamaIbu, 
				CASE WHEN a.Alamat IS NULL THEN '-' ELSE a.Alamat END AS Alamat,
				CASE WHEN a.AlamatKelurahan IS NULL THEN '-' ELSE a.AlamatKelurahan END AS Kelurahan,
				CASE WHEN a.AlamatRT IS NULL THEN '-' ELSE a.AlamatRT END AS RT,
				CASE WHEN a.AlamatRW IS NULL THEN '-' ELSE a.AlamatRW END AS RW,
				CASE WHEN a.AlamatKabupaten IS NULL THEN '-' ELSE a.AlamatKabupaten END AS Kabupaten,
				CASE WHEN a.AlamatKecamatan IS NULL THEN '-' ELSE a.AlamatKecamatan END AS Kecamatan,
				CASE WHEN a.AlamatProvinsi IS NULL THEN '-' ELSE a.AlamatProvinsi END AS Provinsi,
				CASE WHEN a.AlamatKodePos IS NULL THEN '-' ELSE a.AlamatKodePos END AS KodePos,'".$status."',NOW()
				FROM m_penduduk a
				INNER JOIN m_ref_status_kawin q ON a.ReffStatusPerkawinan = q.StatusKawinID
				INNER JOIN m_ref_hubungan_dalam_keluarga d ON a.ReffHubunganDalamKeluarga = d.HubunganID
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				INNER JOIN m_ref_kewarganegaraan o ON a.ReffWarganegara = o.KewarganegaraanID
				WHERE a.NIK = '".$nik."'";
		return $this->query($sql);
	}

	function select_kk_insert_tmp_u($nik, $status) {
		$table = '';
		if ($status == 'kepala') {
			$table = 'm_kartu_kepala_keluarga';
		} else {
			$table = 'm_kartu_anggota_keluarga';
		}

		$sql ="INSERT INTO tmp_u (NIK,NomorKK,NamaLengkap,JenisKelamin,TempatLahir,TanggalLahir,Agama,Pendidikan,Pekerjaan,StatusPerkawinan,Kewarganegaraan,StatusHubunganDalamKeluarga,NomorKitapKitas,NomorPaspor,NamaAyah,NamaIbu,Alamat,RT,RW,Kelurahan,Kecamatan,Kabupaten,Provinsi,KodePos,Status,CreatedDate)
				SELECT NIK,NomorKK,NamaLengkap,JenisKelamin,TempatLahir,TanggalLahir,Agama,Pendidikan,Pekerjaan,StatusPerkawinan,Kewarganegaraan,StatusHubunganDalamKeluarga,NomorKitapKitas,NomorPaspor,NamaAyah,NamaIbu,Alamat,RT,RW,Kelurahan,Kecamatan,Kabupaten,Provinsi,KodePos,'".$status."',NOW()
				FROM ".$table."
				WHERE NIK = '".$nik."'";
		return $this->query($sql);
	}

	function detail_tmp_c($nokk, $status) {
		$sql ="SELECT * FROM tmp_c WHERE NomorKK = '".$nokk."' AND Status = '".$status."'";
		return $this->result($sql);
	}

	function detail_tmp_u($nokk, $status) {
		$sql ="SELECT * FROM tmp_u WHERE NomorKK = '".$nokk."' AND Status = '".$status."'";
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

	function kepala_anggota_keluarga($table, $param) {
		$operator = '';
		if($param == "kepala") {
			$operator = "=";
		}else {
			$operator = "<>";
		}

		$sql = "SELECT a.NIK, a.NamaLengkap,b.JenisKelamin,a.AlamatTempatLahir,a.AlamatDusun,a.AlamatRT,a.AlamatRW FROM m_penduduk a 
				INNER JOIN m_ref_jenis_kelamin b ON a.ReffJenisKelamin=b.KelaminID
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
				e.JenisKelamin,f.Agama,l.PendidikanKK,n.Pekerjaan 
				FROM m_penduduk a
				INNER JOIN m_ref_jenis_kelamin e ON a.ReffJenisKelamin = e.KelaminID
				INNER JOIN m_ref_agama f ON a.ReffAgama = f.AgamaID
				INNER JOIN m_ref_pendidikan_dalam_kk l ON a.ReffPendidikanDalamKK = l.PendidikanKKID
				INNER JOIN m_ref_pekerjaan n ON a.ReffPekerjaan = n.PekerjaanID
				WHERE a.NIK = '".$nik."'";
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

	function detail_penduduk_join_temp($param, $table) {
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
				FROM ".$table." t 
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

	

}
