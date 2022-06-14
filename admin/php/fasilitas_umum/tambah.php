<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $kode_fasilitas = $_POST['kode_fasilitas'];
    $luas_jalan = $_POST["luas_jalan"];
    $fasilitas_umum_terdekat = $_POST["fasilitas_umum_terdekat"];


    $stmt = $koneksi->prepare("INSERT INTO fasilitas_umum (kode_fasilitas,luas_jalan,fasilitas_umum_terdekat) VALUES (?,?,?)");

    $stmt->bind_param("sss",$kode_fasilitas,$luas_jalan,$fasilitas_umum_terdekat);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>