<?php

$server = "localhost";//nama server
$user = "root"; //username server
$pass = "";  //password
$dbase = "kantordesa"; // database yang dipakai

//Membuat koneksi
$koneksi = mysqli_connect($server, $user, $pass, $dbase);

//Mengecek koneksi
if(!$koneksi) {
    die("Koneksi Gagal : ".mysqli_connect_error());
}

?>