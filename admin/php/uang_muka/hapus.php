<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM uang_muka WHERE id_uang_muka=?");
    $stmt->bind_param("i",$id_uang_muka);

    $id_uang_muka = $_POST["id_uang_muka"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>