<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE pengajuan_surat SET id_jenis_surat=?,keperluan=? WHERE id_pengajuan_surat =?");

    $stmt->bind_param("ssi",$id_jenis_surat,$keperluan,$id_pengajuan_surat);

    $id_jenis_surat = $_POST['id_jenis_surat'];
    $keperluan = $_POST["keperluan"];
    $id_pengajuan_surat  = $_POST['id_pengajuan_surat'];

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