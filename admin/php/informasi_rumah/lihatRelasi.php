<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT informasi_rumah.id_rumah,informasi_rumah.biaya_pemesanan_rumah,informasi_rumah.biaya_uang_muka,informasi_rumah.harga_jual,informasi_rumah.plafon_kredit,informasi_rumah.alamat_rumah,informasi_rumah.blok_rumah,informasi_rumah.no_rumah,informasi_rumah.status,tipe_rumah.tipe_rumah,fasilitas_umum.kode_fasilitas
	FROM informasi_rumah 
	INNER JOIN tipe_rumah ON informasi_rumah.id_tipe = tipe_rumah.id_tipe
	INNER JOIN fasilitas_umum ON informasi_rumah.id_fasilitas_umum = fasilitas_umum.id_fasilitas_umum WHERE informasi_rumah.status ='Tersedia' ORDER BY id_rumah DESC");

$stmt->bind_result($id_rumah,$biaya_pemesanan_rumah,$biaya_uang_muka,$harga_jual,$plafon_kredit,$alamat_rumah,$blok_rumah,$no_rumah,$status,$tipe_rumah,$kode_fasilitas);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_rumah"=>$id_rumah,"biaya_pemesanan_rumah"=>$biaya_pemesanan_rumah,"biaya_uang_muka"=>$biaya_uang_muka,"harga_jual"=>$harga_jual,"plafon_kredit"=>$plafon_kredit,"alamat_rumah"=>$alamat_rumah,"blok_rumah"=>$blok_rumah,"no_rumah"=>$no_rumah,"status"=>$status,"tipe_rumah"=>$tipe_rumah,"kode_fasilitas"=>$kode_fasilitas);
    }
    echo json_encode($output);
}
$stmt->close();
?>