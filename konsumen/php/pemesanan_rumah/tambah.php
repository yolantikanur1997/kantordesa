<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $id_konsumen = $_SESSION['id_konsumen'];
    $id_rumah = $_POST["id_rumah"];
    $tenor = $_POST["tenor"];
    $jml_uang_pemesanan_rumah = $_POST["jml_uang_pemesanan_rumah"];
    $tgl_pesan_rumah = date('Y-m-d');
    $status = 'Menunggu Konfirmasi';


    $stmt = $koneksi->prepare("INSERT INTO pemesanan_rumah (id_konsumen,id_rumah,tenor,jml_uang_pemesanan_rumah,tgl_pesan_rumah,status) VALUES (?,?,?,?,?,?)");

    $stmt->bind_param("iissss",$id_konsumen,$id_rumah,$tenor,$jml_uang_pemesanan_rumah,$tgl_pesan_rumah,$status);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>