<?php
session_start();
include("../../../config/koneksi.php");
$stmt = $koneksi->prepare("SELECT pemesanan_rumah.id_konsumen,bukti_transfer.id_bukti_transfer,bukti_transfer.foto_bukti_transfer,bukti_transfer.tgl_upload,konsumen.nik,konsumen.nama_konsumen 
	FROM pemesanan_rumah
INNER JOIN bukti_transfer ON pemesanan_rumah.id_pemesanan = bukti_transfer.id_pemesanan
INNER JOIN konsumen ON pemesanan_rumah.id_konsumen = konsumen.id_konsumen");

$stmt->bind_result($id_konsumen,$id_bukti_transfer,$foto_bukti_transfer,$tgl_upload,$nik,$nama_konsumen);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_konsumen"=>$id_konsumen,"id_bukti_transfer"=>$id_bukti_transfer,"foto_bukti_transfer"=>$foto_bukti_transfer,"tgl_upload"=>$tgl_upload,"nik"=>$nik,"nama_konsumen"=>$nama_konsumen);
    }
    echo json_encode($output);
}
$stmt->close();

?>