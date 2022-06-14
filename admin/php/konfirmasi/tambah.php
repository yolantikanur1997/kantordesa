<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $id_bukti_transfer = $_POST["id_bukti_transfer"];
    $id_pengguna = $_SESSION['id_pengguna'];
    $tanggal = date('Y-m-d');


    $stmt = $koneksi->prepare("INSERT INTO konfirmasi (id_bukti_transfer,id_pengguna,tanggal) VALUES (?,?,?)");

    $stmt->bind_param("iis",$id_bukti_transfer,$id_pengguna,$tanggal);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>