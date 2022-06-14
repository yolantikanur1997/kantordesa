<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE tipe_rumah SET kode_tipe_rumah=?,tipe_rumah=?,luas_tanah=?,luas_bangunan=?,kamar_mandi=?,kamar_tidur=?,listrik=?,sumur=?,lantai=? WHERE id_tipe=?");

     $stmt->bind_param("sssssssssi",$kode_tipe_rumah,$tipe_rumah,$luas_tanah,$luas_bangunan,$kamar_mandi,$kamar_tidur,$listrik,$sumur,$lantai,$id_tipe);

    $kode_tipe_rumah = $_POST['kode_tipe_rumah'];
    $tipe_rumah = $_POST["tipe_rumah"];
    $luas_tanah = $_POST["luas_tanah"];
    $luas_bangunan = $_POST["luas_bangunan"];
    $kamar_mandi = $_POST["kamar_mandi"];
    $kamar_tidur = $_POST["kamar_tidur"];
    $listrik = $_POST["listrik"];
    $sumur = $_POST["sumur"];
    $lantai = $_POST["lantai"];
    $id_tipe = $_POST['id_tipe'];

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