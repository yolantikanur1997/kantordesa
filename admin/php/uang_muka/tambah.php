<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $id_pengguna = $_SESSION['id_pengguna'];
    $id_pemesanan_rumah = $_POST["id_pemesanan_rumah"];
    $jml_uang_muka = $_POST["jml_uang_muka"];
    $tgl_uang_muka = date('Y-m-d');


    $stmt = $koneksi->prepare("INSERT INTO uang_muka (id_pengguna,id_pemesanan_rumah,jml_uang_muka,tgl_uang_muka) VALUES (?,?,?,?)");

    $stmt->bind_param("iiss",$id_pengguna,$id_pemesanan_rumah,$jml_uang_muka,$tgl_uang_muka);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>