<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE pengajuan_surat SET id_pengguna=?,id_jenis_surat=?,tanggal_pengajuan=?,tanggal_selesai=?,keperluan=?,komentar=?,status=? WHERE id_pengajuan_surat=?");

    $stmt->bind_param("iisssssi",$id_pengguna,$id_jenis_surat,$tanggal_pengajuan,$tanggal_selesai,$keperluan,$komentar,$status,$id_pengajuan_surat);

    $id_pengguna = $_POST['id_pengguna'];
    $id_jenis_surat = $_POST["id_jenis_surat"];
    $tanggal_pengajuan = $_POST["tanggal_pengajuan"];
    $tanggal_selesai = $_POST["tanggal_selesai"];
    $keperluan = $_POST["keperluan"];
    $komentar = $_POST["komentar"];
    $status = $_POST["status"];
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