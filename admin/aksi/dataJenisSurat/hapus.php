<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM jenis_surat WHERE id_jenis_surat=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_jenis_surat"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>