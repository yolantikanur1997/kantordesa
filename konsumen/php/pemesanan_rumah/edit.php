<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE pemesanan_rumah SET id_rumah=?,tenor=?,jml_uang_pemesanan_rumah=? WHERE id_pemesanan=?");

     $stmt->bind_param("issi",$id_rumah,$tenor,$jml_uang_pemesanan_rumah,$id_pemesanan);

    $id_rumah = $_POST['id_rumah'];
    $tenor = $_POST["tenor"];
    $jml_uang_pemesanan_rumah = $_POST["jml_uang_pemesanan_rumah"];
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