<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_fasilitas_umum,kode_fasilitas,luas_jalan,fasilitas_umum_terdekat FROM fasilitas_umum WHERE id_fasilitas_umum=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_fasilitas_umum = $_POST['id_fasilitas_umum'];
    $stmt->bind_param("i", $id_fasilitas_umum);


    $stmt->bind_result($id_fasilitas_umum,$kode_fasilitas,$luas_jalan,$fasilitas_umum_terdekat);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_fasilitas_umum"=>$id_fasilitas_umum,"kode_fasilitas"=>$kode_fasilitas,"luas_jalan"=>$luas_jalan,"fasilitas_umum_terdekat"=>$fasilitas_umum_terdekat);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>