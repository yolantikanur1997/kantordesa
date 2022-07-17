<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("DELETE FROM pengajuan_surat WHERE id_pengajuan_surat=?");
    $stmt->bind_param("i",$id);

    $id = $_POST["id_pengajuan_surat"];

    if ($stmt->execute()) {
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>