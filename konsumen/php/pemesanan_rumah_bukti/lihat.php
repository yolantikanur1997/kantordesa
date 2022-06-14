<?php
session_start();
include("../../../config/koneksi.php");
$stmt = $koneksi->prepare("SELECT pemesanan_rumah.id_konsumen,bukti_transfer.id_bukti_transfer,bukti_transfer.foto_bukti_transfer,bukti_transfer.tgl_upload FROM pemesanan_rumah
INNER JOIN bukti_transfer ON pemesanan_rumah.id_pemesanan = bukti_transfer.id_pemesanan 
WHERE pemesanan_rumah.id_konsumen=" . $_SESSION['id_konsumen']);

$stmt->bind_result($id_konsumen,$id_bukti_transfer,$foto_bukti_transfer,$tgl_upload);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_konsumen"=>$id_konsumen,"id_bukti_transfer"=>$id_bukti_transfer,"foto_bukti_transfer"=>$foto_bukti_transfer,"tgl_upload"=>$tgl_upload);
    }
    echo json_encode($output);
}
$stmt->close();

?>