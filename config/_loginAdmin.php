<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];



// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi,"select * from pengguna where username='$username'");   

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($result);// cek apakah username dan password di temukan pada database
 

if($cek > 0){
  
$data = mysqli_fetch_assoc($result);
 $_SESSION['nama'] = $data['nama'];
 $_SESSION['id_pengguna'] = $data['id_pengguna'];
  /* $_SESSION['nama'] = $data['nama']; //mengambil session diluar data login*/

  // cek jika user login sebagai kepalabagian
if(password_verify($password, $data['password']) ){
 
  if($data['level']=="Marketing"){  
    
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;   
    $_SESSION['level'] = "Marketing";
    // alihkan ke halaman dashboard admin
  echo "<script>
  alert('Berhasil Login'); window.location='../marketing/index.php'</script>";
/* }*/
}  
  else if($data['level']=="Direktur"){
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;   
    $_SESSION['level'] = "Direktur";
    // alihkan ke halaman dashboard pegawai
  echo "<script>
  alert('Berhasil Login'); window.location='../direktur/index.php'</script>";

  // cek jika user login sebagai pengurus
      }else if($data['level']=="Keuangan"){
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;   
    $_SESSION['level'] = "Keuangan";
    // alihkan ke halaman dashboard pegawai
  echo "<script>
  alert('Berhasil Login'); window.location='../keuangan/index.php'</script>";

  // cek jika user login sebagai pengurus
      }
}else {
        echo "<script>
  alert('Password Anda Salah, Coba Lagi!'); window.location='../index.php'</script>";
      }   
  

}else{
   
  
  echo "<script>
  alert('Ada Kesalahan! Cek Kembali Username dan Password Anda'); window.location='../index.php'</script>";

}


?>