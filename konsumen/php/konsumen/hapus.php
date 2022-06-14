<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM konsumen WHERE id_konsumen=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_konsumen"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>