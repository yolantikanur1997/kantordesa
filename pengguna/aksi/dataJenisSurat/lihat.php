<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id_jenis_surat,nama_surat,keterangan FROM jenis_surat ORDER BY id_jenis_surat DESC");

$stmt->bind_result($id_jenis_surat,$nama_surat,$keterangan);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_jenis_surat"=>$id_jenis_surat,"nama_surat"=>$nama_surat,"keterangan"=>$keterangan);
    }
    echo json_encode($output);
}
$stmt->close();
?>