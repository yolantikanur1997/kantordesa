<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form

$nik = $_POST['nik'];
$password = $_POST['password'];

 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from pengguna where nik='$nik'");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


if($cek > 0){

$data2 = mysqli_fetch_array($data);
  $_SESSION['id_pengguna'] = $data2['id_pengguna'];
  $_SESSION['nama'] = $data2['nama'];
  // $_SESSION['nama'] = $data2['nama'];

if(password_verify($password, $data2['password']) ){
  $_SESSION['nik'] = $nik;
  $_SESSION['password'] = $password;
  $_SESSION['status'] = "login";

  echo "<script>alert('Selamat Datang'); window.location='../pengguna/index.php'</script>"; 

}else{
   echo "<script>
  alert('Password Anda Salah, Coba Lagi!'); window.location='../login.php'</script>";
}
}else {
  echo "<script>
  alert('Anda Gagal Masuk! Cek Kembali Username dan Password'); window.location='../login.php'</script>";
}
?>