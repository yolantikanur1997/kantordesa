<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM bukti_transfer WHERE id_bukti_transfer=?");
    $stmt->bind_param("i",$id_bukti_transfer);

    $id_bukti_transfer = $_POST["id_bukti_transfer"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>