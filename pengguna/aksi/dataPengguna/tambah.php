<?php
include("config/koneksi.php");

function registrasi($data)
 {

  	// var_dump('expression'); die;
 	global $koneksi;
 	$no_kk = $data["no_kk"];
 	$nik = $data["nik"];
 	$nama = $data["nama"];
 	$tempat_lahir = $data["tempat_lahir"];
 	$tanggal_lahir = $data["tanggal_lahir"];
 	$jenis_kelamin = $data["jenis_kelamin"];
 	$alamat = $data["alamat"];
 	$rt = $data["rt"];
 	$rw = $data["rw"];
 	$kelurahan = $data["kelurahan"];
 	$kecamatan = $data["kecamatan"];
 	$agama = $data["agama"];
 	$status_perkawinan = $data["status_perkawinan"];
 	$pekerjaan = $data["pekerjaan"];
 	$status_perkawinan = $data["status_perkawinan"];
 	$kewarganegaraan = $data["kewarganegaraan"];
 	$password = mysqli_real_escape_string($koneksi, $data["password"]);
 	

 	//mengecek username
 	$result = mysqli_query($koneksi, "SELECT no_kk FROM pengguna WHERE no_kk = '$no_kk'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
			     alert('No KK Tidak Boleh Sama!');
			     </script>";

			     return false;
		}
		
		//mengecek username
		$result = mysqli_query($koneksi, "SELECT nik FROM pengguna WHERE nik = '$nik'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>
			     alert('NIK Tidak Boleh Sama!');
			     </script>";

			     return false;
		}

	
	//enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan userbaru ke database

	mysqli_query($koneksi, "INSERT INTO pengguna VALUES('','$no_kk','$nik','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$alamat','$rt','$rw','$kelurahan','$kecamatan','$agama','$status_perkawinan','$pekerjaan','$kewarganegaraan','$password')");

	return mysqli_affected_rows($koneksi);

 }
 ?>