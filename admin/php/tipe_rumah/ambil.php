<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_tipe,kode_tipe_rumah,tipe_rumah,luas_tanah,luas_bangunan,kamar_mandi,kamar_tidur,listrik,sumur,lantai FROM tipe_rumah WHERE id_tipe=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_tipe = $_POST['id_tipe'];
    $stmt->bind_param("i", $id_tipe);


    $stmt->bind_result($id_tipe,$kode_tipe_rumah,$tipe_rumah,$luas_tanah,$luas_bangunan,$kamar_mandi,$kamar_tidur,$listrik,$sumur,$lantai);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_tipe"=>$id_tipe,"kode_tipe_rumah"=>$kode_tipe_rumah,"tipe_rumah"=>$tipe_rumah,"luas_tanah"=>$luas_tanah,"luas_bangunan"=>$luas_bangunan,"kamar_mandi"=>$kamar_mandi,"kamar_tidur"=>$kamar_tidur,"listrik"=>$listrik,"sumur"=>$sumur,"lantai"=>$lantai);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>