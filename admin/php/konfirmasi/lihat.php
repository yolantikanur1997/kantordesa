<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT konfirmasi.id_konfirmasi,pemesanan_rumah.id_pemesanan,pemesanan_rumah.tenor,pemesanan_rumah.jml_uang_pemesanan_rumah,pemesanan_rumah.tgl_pesan_rumah,pemesanan_rumah.status,informasi_rumah.no_rumah,tipe_rumah.tipe_rumah,konsumen.nama_konsumen,konsumen.nik,konfirmasi.tanggal,pengguna.nama
FROM pemesanan_rumah
INNER JOIN informasi_rumah ON informasi_rumah.id_rumah = pemesanan_rumah.id_rumah
INNER JOIN tipe_rumah ON tipe_rumah.id_tipe = informasi_rumah.id_tipe
INNER JOIN konsumen ON pemesanan_rumah.id_konsumen = konsumen.id_konsumen
INNER JOIN bukti_transfer ON pemesanan_rumah.id_pemesanan = bukti_transfer.id_pemesanan
INNER JOIN konfirmasi ON bukti_transfer.id_bukti_transfer = konfirmasi.id_bukti_transfer
INNER JOIN pengguna ON pengguna.id_pengguna = konfirmasi.id_pengguna");

$stmt->bind_result($id_konfirmasi,$id_pemesanan,$tenor,$jml_uang_pemesanan_rumah,$tgl_pesan_rumah,$status,$no_rumah,$tipe_rumah,$nama_konsumen,$nik,$tanggal,$nama);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_konfirmasi"=>$id_konfirmasi,"id_pemesanan"=>$id_pemesanan,"tenor"=>$tenor,"jml_uang_pemesanan_rumah"=>$jml_uang_pemesanan_rumah,"tgl_pesan_rumah"=>$tgl_pesan_rumah,"status"=>$status,"no_rumah"=>$no_rumah,"tipe_rumah"=>$tipe_rumah,"nama_konsumen"=>$nama_konsumen,"nik"=>$nik,"tanggal"=>$tanggal,"nama"=>$nama);
    }
    echo json_encode($output);
}
$stmt->close();
?>