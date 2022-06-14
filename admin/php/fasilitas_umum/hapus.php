<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM fasilitas_umum WHERE id_fasilitas_umum=?");
    $stmt->bind_param("i",$id_fasilitas_umum);

    $id_fasilitas_umum = $_POST["id_fasilitas_umum"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>