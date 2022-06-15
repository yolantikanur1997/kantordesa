<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $nama_surat = $_POST['nama_surat'];
    $keterangan = $_POST['keterangan'];

    $stmt = $koneksi->prepare("INSERT INTO jenis_surat (nama_surat,keterangan) VALUES (?,?)");

    $stmt->bind_param("ss",$nama_surat,$keterangan);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>