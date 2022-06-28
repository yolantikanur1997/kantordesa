<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $no_pengajuan_surat = $_POST['no_pengajuan_surat'];
    $id_pengguna = $_SESSION['id_pengguna'];
    $id_jenis_surat = $_POST['id_jenis_surat'];
    $tanggal_pengajuan = date('d-m-y');
    $keperluan = $_POST['keperluan'];
    $status = 'Pengajuan';

    $stmt = $koneksi->prepare("INSERT INTO pengajuan_surat (no_pengajuan_surat,id_pengguna,id_jenis_surat,tanggal_pengajuan,keperluan,status) VALUES (?,?,?,?,?,?)");

    $stmt->bind_param("siisss",$no_pengajuan_surat,$id_pengguna,$id_jenis_surat,$tanggal_pengajuan,$keperluan,$status);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>