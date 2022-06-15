<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE jenis_surat SET nama_surat=?,keterangan=? WHERE id_jenis_surat=?");

     $stmt->bind_param("ssi",$nama_surat,$keterangan,$id_jenis_surat);

    $nama_surat = $_POST['nama_surat'];
    $keterangan = $_POST["keterangan"];
    $id_jenis_surat = $_POST['id_jenis_surat'];

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