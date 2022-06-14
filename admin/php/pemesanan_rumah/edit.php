<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE pemesanan_rumah SET id_konsumen=?,id_rumah=?,tenor=?,jml_uang_pemesanan_rumah=?,status=? WHERE id_pemesanan=?");

     $stmt->bind_param("iisssi",$id_konsumen,$id_rumah,$tenor,$jml_uang_pemesanan_rumah,$status,$id_pemesanan);

    $id_rumah = $_POST['id_rumah'];
    $id_konsumen = $_POST['id_konsumen'];
    $tenor = $_POST["tenor"];
    $jml_uang_pemesanan_rumah = $_POST["jml_uang_pemesanan_rumah"];
    $status = $_POST["status"];
    $id_pemesanan = $_POST['id_pemesanan'];

    if ($stmt->execute()) {
        echo 1;
    }
    else
    {
        echo 0;
    }
    $stmt->close();
}
?> 