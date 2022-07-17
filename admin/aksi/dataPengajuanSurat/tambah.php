<?php
session_start();
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $no_pengajuan_surat = $_POST['no_pengajuan_surat'];
    $id_pengguna = $_POST['id_pengguna'];
    $id_jenis_surat = $_POST['id_jenis_surat'];
    $tanggal_pengajuan = $_POST['tanggal_pengajuan'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $keperluan = $_POST['keperluan'];
    $komentar = $_POST['komentar'];
    $status = $_POST['status'];

    $stmt = $koneksi->prepare("INSERT INTO pengajuan_surat (no_pengajuan_surat,id_pengguna,id_jenis_surat,tanggal_pengajuan,tanggal_selesai,keperluan,komentar,status) VALUES (?,?,?,?,?,?,?,?)");

    $stmt->bind_param("siisssss",$no_pengajuan_surat,$id_pengguna,$id_jenis_surat,$tanggal_pengajuan,$tanggal_selesai,$keperluan,$komentar,$status);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>