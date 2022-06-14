<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT informasi_rumah.id_rumah,informasi_rumah.biaya_uang_muka,pemesanan_rumah.id_pemesanan
    FROM informasi_rumah
    INNER JOIN pemesanan_rumah ON informasi_rumah.id_rumah = pemesanan_rumah.id_rumah WHERE pemesanan_rumah.id_pemesanan=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_pemesanan = $_POST['id_pemesanan'];
    $stmt->bind_param("i", $id_pemesanan);


    $stmt->bind_result($id_rumah,$biaya_uang_muka,$id_pemesanan);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output[] = array("id_rumah"=>$id_rumah,"biaya_uang_muka"=>$biaya_uang_muka,"id_pemesanan"=>$id_pemesanan);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>