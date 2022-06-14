<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM konfirmasi WHERE id_konfirmasi=?");
    $stmt->bind_param("i",$id_konfirmasi);

    $id_konfirmasi = $_POST["id_konfirmasi"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>