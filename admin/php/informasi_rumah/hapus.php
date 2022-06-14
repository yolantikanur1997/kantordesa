<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM informasi_rumah WHERE id_rumah=?");
    $stmt->bind_param("i",$id_rumah);

    $id_rumah = $_POST["id_rumah"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>