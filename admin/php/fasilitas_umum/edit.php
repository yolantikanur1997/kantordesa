<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE fasilitas_umum SET kode_fasilitas=?,luas_jalan=?,fasilitas_umum_terdekat=? WHERE id_fasilitas_umum =?");

     $stmt->bind_param("sssi",$kode_fasilitas,$luas_jalan,$fasilitas_umum_terdekat,$id_fasilitas_umum);

    $kode_fasilitas = $_POST['kode_fasilitas'];
    $luas_jalan = $_POST["luas_jalan"];
    $fasilitas_umum_terdekat = $_POST["fasilitas_umum_terdekat"];
    $id_fasilitas_umum  = $_POST['id_fasilitas_umum'];

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