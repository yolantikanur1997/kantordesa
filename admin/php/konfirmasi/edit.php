<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE konfirmasi SET id_bukti_transfer=? WHERE id_konfirmasi =?");

     $stmt->bind_param("ii",$id_bukti_transfer,$id_konfirmasi);


    $id_bukti_transfer = $_POST['id_bukti_transfer'];
    $id_konfirmasi  = $_POST['id_konfirmasi'];

    if ($stmt->execute()) {
        echo 1;
    }
    else
    {
        echo 0;
    }
    $stmt->close();
}
?> 