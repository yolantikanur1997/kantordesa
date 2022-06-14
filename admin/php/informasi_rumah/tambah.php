<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $id_tipe = $_POST['tipe_rumah'];
    $id_fasilitas_umum = $_POST["fasilitas"];
    $biaya_pemesanan_rumah = $_POST["biaya_pemesanan_rumah"];
    $biaya_uang_muka = $_POST["biaya_uang_muka"];
    $harga_jual = $_POST["harga_jual"];
    $plafon_kredit = $_POST["plafon_kredit"];
    $alamat_rumah = $_POST["alamat"];
    $blok_rumah = $_POST["blok_rumah"];
    $no_rumah = $_POST["no_rumah"];
    $status = $_POST["status"];


    $stmt = $koneksi->prepare("INSERT INTO informasi_rumah(id_tipe,id_fasilitas_umum,biaya_pemesanan_rumah,biaya_uang_muka,harga_jual,plafon_kredit,alamat_rumah,blok_rumah,no_rumah,status) VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("iiiiiissss",$id_tipe,$id_fasilitas_umum,$biaya_pemesanan_rumah,$biaya_uang_muka,$harga_jual,$plafon_kredit,$alamat_rumah,$blok_rumah,$no_rumah,$status);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>