<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM pemesanan_rumah WHERE id_pemesanan=?");
    $stmt->bind_param("i",$id_pemesanan);

    $id_pemesanan = $_POST["id_pemesanan"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>