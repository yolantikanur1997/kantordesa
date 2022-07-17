<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT pengajuan_surat.id_pengajuan_surat,pengajuan_surat.no_pengajuan_surat,
pengajuan_surat.id_jenis_surat,pengajuan_surat.tanggal_pengajuan,pengajuan_surat.tanggal_selesai,
pengajuan_surat.keperluan,pengajuan_surat.komentar,pengajuan_surat.status,pengguna.nik,jenis_surat.nama_surat,pengguna.nama
FROM pengajuan_surat 
INNER JOIN jenis_surat ON pengajuan_surat.id_jenis_surat = jenis_surat.id_jenis_surat
INNER JOIN pengguna ON pengajuan_surat.id_pengguna = pengguna.id_pengguna");

$stmt->bind_result($id_pengajuan_surat,$no_pengajuan_surat,$id_jenis_surat,$tanggal_pengajuan,$tanggal_selesai,$keperluan,$komentar,$status,$nik,$nama_surat,$nama);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_pengajuan_surat"=>$id_pengajuan_surat,"no_pengajuan_surat"=>$no_pengajuan_surat,"id_jenis_surat"=>$id_jenis_surat,"tanggal_pengajuan"=>$tanggal_pengajuan,"tanggal_selesai"=>$tanggal_selesai,"keperluan"=>$keperluan,"komentar"=>$komentar,"status"=>$status,"nik"=>$nik,"nama_surat"=>$nama_surat,"nama"=>$nama);
    }
    echo json_encode($output);
}
$stmt->close();
?>