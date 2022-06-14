<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE uang_muka SET id_pemesanan_rumah=?,jml_uang_muka=? WHERE id_uang_muka=?");

     $stmt->bind_param("isi",$id_pemesanan_rumah,$jml_uang_muka,$id_uang_muka);

    $id_pemesanan_rumah = $_POST['id_pemesanan_rumah'];
    $jml_uang_muka = $_POST['jml_uang_muka'];
    $id_uang_muka  = $_POST['id_uang_muka'];

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