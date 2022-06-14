<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id_fasilitas_umum,kode_fasilitas,luas_jalan,fasilitas_umum_terdekat FROM fasilitas_umum ORDER BY id_fasilitas_umum DESC");

$stmt->bind_result($id_fasilitas_umum,$kode_fasilitas,$luas_jalan,$fasilitas_umum_terdekat);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_fasilitas_umum"=>$id_fasilitas_umum,"kode_fasilitas"=>$kode_fasilitas,"luas_jalan"=>$luas_jalan,"fasilitas_umum_terdekat"=>$fasilitas_umum_terdekat);
    }
    echo json_encode($output);
}
$stmt->close();
?>