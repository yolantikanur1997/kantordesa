<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_uang_muka,id_pemesanan_rumah,jml_uang_muka,tgl_uang_muka FROM uang_muka WHERE id_uang_muka=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_uang_muka = $_POST['id_uang_muka'];
    $stmt->bind_param("i", $id_uang_muka);


    $stmt->bind_result($id_uang_muka,$id_pemesanan_rumah,$jml_uang_muka,$tgl_uang_muka);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_uang_muka"=>$id_uang_muka,"id_pemesanan_rumah"=>$id_pemesanan_rumah,"jml_uang_muka"=>$jml_uang_muka,"tgl_uang_muka"=>$tgl_uang_muka);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>