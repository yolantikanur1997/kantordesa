<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $kode_tipe_rumah = $_POST['kode_tipe_rumah'];
    $tipe_rumah = $_POST["tipe_rumah"];
    $luas_tanah = $_POST["luas_tanah"];
    $luas_bangunan = $_POST["luas_bangunan"];
    $kamar_mandi = $_POST["kamar_mandi"];
    $kamar_tidur = $_POST["kamar_tidur"];
    $listrik = $_POST["listrik"];
    $sumur = $_POST["sumur"];
    $lantai = $_POST["lantai"];


    $stmt = $koneksi->prepare("INSERT INTO tipe_rumah (kode_tipe_rumah,tipe_rumah,luas_tanah,luas_bangunan,kamar_mandi,kamar_tidur,listrik,sumur,lantai) VALUES (?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssssss",$kode_tipe_rumah,$tipe_rumah,$luas_tanah,$luas_bangunan,$kamar_mandi,$kamar_tidur,$listrik,$sumur,$lantai);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>