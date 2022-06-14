<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT pemesanan_rumah.id_pemesanan,pemesanan_rumah.tenor,pemesanan_rumah.jml_uang_pemesanan_rumah,pemesanan_rumah.tgl_pesan_rumah,pemesanan_rumah.status,informasi_rumah.no_rumah,tipe_rumah.tipe_rumah
	FROM pemesanan_rumah
	INNER JOIN informasi_rumah ON informasi_rumah.id_rumah = pemesanan_rumah.id_rumah
	INNER JOIN tipe_rumah ON tipe_rumah.id_tipe = informasi_rumah.id_tipe WHERE pemesanan_rumah.id_konsumen=" . $_SESSION['id_konsumen']);

$stmt->bind_result($id_pemesanan,$tenor,$jml_uang_pemesanan_rumah,$tgl_pesan_rumah,$status,$no_rumah,$tipe_rumah);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_pemesanan"=>$id_pemesanan,"tenor"=>$tenor,"jml_uang_pemesanan_rumah"=>$jml_uang_pemesanan_rumah,"tgl_pesan_rumah"=>$tgl_pesan_rumah,"status"=>$status,"no_rumah"=>$no_rumah,"tipe_rumah"=>$tipe_rumah);
    }
    echo json_encode($output);
}
$stmt->close();
?>