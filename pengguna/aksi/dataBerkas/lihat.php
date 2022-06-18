<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT berkas.id_berkas,berkas.id_pengguna,berkas.jenis_berkas,berkas.nama_berkas,pengguna.nik,pengguna.nama 
FROM berkas 
INNER JOIN pengguna ON berkas.id_pengguna = pengguna.id_pengguna WHERE nik=" . $_SESSION['nik']);

$stmt->bind_result($id_berkas,$id_pengguna,$jenis_berkas,$nama_berkas,$nik,$nama);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_berkas"=>$id_berkas,"id_pengguna"=>$id_pengguna,"jenis_berkas"=>$jenis_berkas,"nama_berkas"=>$nama_berkas,"nik"=>$nik,"nama"=>$nama);
    }
    echo json_encode($output);
}
$stmt->close();
?>