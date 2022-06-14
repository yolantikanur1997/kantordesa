<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM tipe_rumah WHERE id_tipe=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_tipe"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>