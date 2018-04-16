<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Commons {

		function ceksession() {
			$CI =& get_instance();
			if($CI->session->userdata('Nama') != '') {
				return true;
			} else {
				return false;
			}
		}

		function status_keluarga() {
			return array(
				'Kepala Keluarga' 	=> 'Kepala Keluarga', 
				'Istri'		=> 'Istri',
				'Anak' 		=> 'Anak'
			);
		}

		function status_kawin() {
			return array(
				'Kawin' 		=> 'Kawin', 
				'Belum Kawin'	=> 'Belum Kawin',
				'Cerai' 		=> 'Cerai'
			);
		}

		function agama() {
			return array(
				'Islam' 	=> 'Islam', 
				'Kristen'	=> 'Kristen',
				'Hindu' 	=> 'Hindu', 
				'Buddha'	=> 'Buddha',
				'Konghuchu'	=> 'Kong Hu Chu',
				'Lainnya'	=> 'Lainnya'
			);
		}

		function status_hidup() {
			return array(
				'T' => 'Hidup', 
				'Y'	=> 'Meninggal'
			);
		}

		function status_warga() {
			return array(
				'WNI' 	=> 'WNI', 
				'WNA'	=> 'WNA'
			);
		}

		function jk() {
			return array(
				'L' => 'Laki-laki', 
				'P'	=> 'Perempuan'
			);
		}

		function role() {
			return array(
				'1' => 'Sysadmin', 
				'2'	=> 'Administrator',
				'3'	=> 'User'
			);
		}

		function status_pengguna() {
			return array(
				1	=> 'Aktif',
				0 	=> 'Tidak Aktif'
			);
		}

		function status_kerja() {
			return array(
				1	=> 'Aktif',
				0 	=> 'Tidak Aktif'
			);
		}

		function status_login() {
			return array(
				1	=> 'Aktif',
				0 	=> 'Tidak Aktif'
			);
		}

		function pilihan() {
			return array(
				1	=> 'Iya',
				0 	=> 'Tidak'
			);
		}

		function jenis_identitas() {
			return array(
				1 	=> 'NIK', 
				2	=> 'Paspor',
				3 	=> 'Tax ID', 
				4	=> 'Lainnya'
			);
		}

		function golongan_darah() {
			return array(
				'A' 	=> 'A', 
				'AB'	=> 'AB',
				'B' 	=> 'B', 
				'O'		=> 'O'
			);
		}

		function getArrayKeys($data, $value) {
			return $data[$value];
		}

		function encodebase64($str) {
			return base64_encode($str);
		}

		function decodebase64($str) {
			return base64_decode($str);
		}

		function datetimenow() {
			date_default_timezone_set("Asia/Jakarta");
      		return date('Y-m-d H:i:s');
		}

		function ipaddress() {
			return gethostbyname(gethostname());
		}

		function hitung_umur($tgl) {
			$tahun = '0';
			$today = new DateTime('today');
			$birthDt = new DateTime($tgl);

			$y = $today->diff($birthDt)->y.' Tahun';
		    $m = $today->diff($birthDt)->m.' Bulan';
		    $d = $today->diff($birthDt)->d.' Hari';

		    if(($tgl == '0000-00-00') || ($birthDt == $today)) {
		        return $tahun.' Thn';
		    } else {
		    	if(($y == 0) && ($m == 0) && ($d > 0)) {
		    		return $d;
		    	} else if (($y == 0) && ($m > 0) && ($d > 0)) {
		    		return $m;
		    	} else {
		    		return $y.' '.$m;
		    	}
		    }
		}

		function format_tanggal($tgl) {
			if($tgl == '0000-00-00') {
				echo '00-00-0000';
			} else {
				$date=date_create($tgl);
				echo date_format($date,"d-m-Y");
			}
		}
	}